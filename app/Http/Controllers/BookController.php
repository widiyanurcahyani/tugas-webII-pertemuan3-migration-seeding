<?php


namespace App\Http\Controllers;

use App\Exports\BooksExport;
use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $books = Book::with('bookshelf')

            ->when($search, function($query) use ($search){

                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('author', 'like', '%' . $search . '%')
                      ->orWhere('publisher', 'like', '%' . $search . '%');

            })

            ->latest()
            ->paginate(5);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookshelves = Bookshelf::all();

        return view('books.create', compact('bookshelves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year_publish' => 'required',
            'publisher' => 'required',
            'city' => 'required',
            'cover' => 'required|image',
            'bookshelf_id' => 'required'
        ]);

        $cover = $request->file('cover');
        $coverName = time() . '.' . $cover->extension();

        $cover->move(public_path('cover'), $coverName);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year_publish' => $request->year_publish,
            'publisher' => $request->publisher,
            'city' => $request->city,
            'cover' => $coverName,
            'bookshelf_id' => $request->bookshelf_id
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('bookshelf')->findOrFail($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        $bookshelves = Bookshelf::all();

        return view('books.edit', compact('book', 'bookshelves'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year_publish' => 'required',
            'publisher' => 'required',
            'city' => 'required',
            'bookshelf_id' => 'required'
        ]);

        if ($request->hasFile('cover')) {

            if (file_exists(public_path('cover/' . $book->cover))) {
                unlink(public_path('cover/' . $book->cover));
            }

            $cover = $request->file('cover');
            $coverName = time() . '.' . $cover->extension();

            $cover->move(public_path('cover'), $coverName);

            $book->cover = $coverName;
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->year_publish = $request->year_publish;
        $book->publisher = $request->publisher;
        $book->city = $request->city;
        $book->bookshelf_id = $request->bookshelf_id;

        $book->save();

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        if (file_exists(public_path('cover/' . $book->cover))) {
            unlink(public_path('cover/' . $book->cover));
        }

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil dihapus');
    }

    public function exportExcel()
{
    return Excel::download(new BooksExport, 'data-buku.xlsx');
}

public function importExcel(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new BooksImport, $request->file('file'));

    return redirect()
        ->route('books.index')
        ->with('success', 'Data berhasil diimport');
}

public function printPdf()
{
    $books = Book::all();

    $pdf = PDF::loadView('books.pdf', compact('books'));

    return $pdf->stream('books.pdf');
}

}
<?php

namespace App\Http\Controllers;

use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookshelves = Bookshelf::all();

        return view('bookshelves.index', compact('bookshelves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookshelves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        Bookshelf::create([
            'code' => $request->code,
            'name' => $request->name
        ]);

        return redirect()
            ->route('bookshelves.index')
            ->with('success', 'Data rak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bookshelf = Bookshelf::findOrFail($id);

        return view('bookshelves.edit', compact('bookshelf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookshelf = Bookshelf::findOrFail($id);

        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $bookshelf->code = $request->code;
        $bookshelf->name = $request->name;

        $bookshelf->save();

        return redirect()
            ->route('bookshelves.index')
            ->with('success', 'Data rak berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookshelf = Bookshelf::findOrFail($id);

        $bookshelf->delete();

        return redirect()
            ->route('bookshelves.index')
            ->with('success', 'Data rak berhasil dihapus');
    }
}
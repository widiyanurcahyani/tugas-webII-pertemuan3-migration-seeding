<?php

namespace App\Imports;

use App\Models\Book;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BooksImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $key => $row) {

            if ($key == 0) {
                continue;
            }

            Book::create([
                'title' => $row[0],
                'author' => $row[1],
                'year_publish' => $row[2],
                'publisher' => $row[3],
                'city' => $row[4],
                'cover' => 'default.png',
                'bookshelf_id' => $row[5],
            ]);

        }

    }
}
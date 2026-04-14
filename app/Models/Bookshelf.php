<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    protected $table = 'bookshelves';

    protected $fillable = [
        'name',
        'location'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
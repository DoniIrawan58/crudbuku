<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
        'isbn',
        'name',
        'year',
        'page',
        'publisher_id',
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class)
            ->withDefault([
                'identifier' => 'WITHOUT ID',
                'fname' => 'NOT FOUND',
                'lname' => 'NOT FOUND',
            ]);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors')
            ->using(BookAuthor::class);
    }
}

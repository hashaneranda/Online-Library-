<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category',
        'title',
        'description',
        'author',
        'isbn_number',
        'year',
        'price',
        'publisher',
        'type',
        'filename',
        'image',
        'is_deleted'
    ];
}

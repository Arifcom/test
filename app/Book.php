<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code', 'title', 'description', 'author', 'publisher', 'publication_year', 'created_at', 'updated_at'
    ];
}
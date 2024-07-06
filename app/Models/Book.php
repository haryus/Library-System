<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "author",
        "isbn",
        "genre",
        "publisher",
        "publisherYear",
        "price",
        "stockQuantity",
        "img",
        
    ];

    protected $dates = ["created_at", "updated_at"];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author');
    }
}

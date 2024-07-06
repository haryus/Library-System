<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "customerName", "bookID", "quantity", "saleDate", "totalPrice"
    ];

    protected $dates = ["created_at", "updated_at"];

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookID');
    }
}

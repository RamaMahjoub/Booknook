<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'returned', 'book_id', 'order_id'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function book(){
        return $this->belongsTo(LibraryBook::class);
    }
}

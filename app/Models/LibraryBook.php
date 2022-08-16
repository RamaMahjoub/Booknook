<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class LibraryBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'book_id',
        'quantity',
        'purchasing_price',
        'selling_price',
        'state',
        'rate',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function saved_books(){
        return $this->hasMany(SaveBook::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'book_offers', 'offer_id', 'book_id');
    }

    public function borrow_proccess(){
        return $this->hasMany(BorrowProcess::class);
    }
}

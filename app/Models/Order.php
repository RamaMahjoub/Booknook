<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'library_id', 'address_id', 'totalPrice', 'status_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function borrow_proccess(){
        return $this->hasMany(BorrowProcess::class);
    }

    public function sub_order(){
        return $this->hasMany(SubOrder::class);
    }
}

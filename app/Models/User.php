<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'email',
        'password',
        'role_id',
        'is_verified',
        'provider_id',
        'step'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function adminInformation()
    {
        return $this->hasOne(AdminInformation::class);
    }

    public function customerInformation()
    {
        return $this->hasOne(CustomerInformation::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'favorite_categories', 'user_id', 'category_id');
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function saved_books(){
        return $this->hasMany(SaveBook::class);
    }

    public function quotes(){
        return $this->hasMany(Quote::class);
    }

    public function rate(){
        return $this->hasOne(Rate::class);
    }

    public function recent_search(){
        return $this->hasMany(RecentSearch::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function orderes(){
        return $this->hasMany(Order::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Librarian extends Authenticable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "name",
        "email",
        "password"
    ];

    protected $hidden = [
        'password',
    ];


    public function readers()
    {
        return $this->hasMany(Reader::class);
    }
    public function cds()
    {
        return $this->hasMany(CD::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function newspapers()
    {
        return $this->hasMany(NewsPaper::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

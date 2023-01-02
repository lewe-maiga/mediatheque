<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function cds()
    {
        return $this->hasMany(CD::class);
    }

    protected $fillable = ["name"];
}

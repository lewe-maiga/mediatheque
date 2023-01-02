<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    use HasFactory;


    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function librarian()
    {
        return $this->belongsTo(Librarian::class);
    }
}

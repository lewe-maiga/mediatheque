<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    public function microfilm()
    {
        return $this->belongsTo(Microfilm::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function librarian()
    {
        return $this->belongsTo(Librarian::class);
    }


    protected $fillable = [
        "title",
        "address",
        "category",
        "summary",
        "special",
        "isAvailable",
        "isLost",
        "librarian_id",
        "author_id",
        "microfilm_id",
    ];
}

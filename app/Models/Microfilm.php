<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Microfilm extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasOne(Book::class);
    }
    public function newspaper()
    {
        return $this->hasOne(NewsPaper::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
    protected $fillable = ["duration"];
}

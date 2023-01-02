<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function reader()
    {
        return $this->hasOne(Reader::class);
    }
    public function cd()
    {
        return $this->hasOne(CD::class);
    }
    public function book()
    {
        return $this->hasOne(Book::class);
    }
    public function newspaper()
    {
        return $this->hasOne(NewsPaper::class);
    }
    public function microfilm()
    {
        return $this->hasOne(Microfilm::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPaper extends Model
{
    use HasFactory;

    public function microfilm()
    {
        return $this->belongsTo(Microfilm::class);
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

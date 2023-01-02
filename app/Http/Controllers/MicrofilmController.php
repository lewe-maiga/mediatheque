<?php

namespace App\Http\Controllers;

use App\Models\Microfilm;
use Illuminate\Http\Request;

class MicrofilmController extends Controller
{
    public function index()
    {
        $microfilms = Microfilm::with(["newspaper", "book", "user"])->get();

        return response()->json($microfilms);
    }
}

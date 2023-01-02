<?php

namespace App\Http\Controllers;

use App\Models\NewsPaper;
use Illuminate\Http\Request;

class NewsPaperController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search == "") {
            $newspapers = NewsPaper::all();
            return response()->json($newspapers);
        }
        $newspapers = NewsPaper::where("title", "LIKE", "%{$search}%")->orWhere("id", "=", $search)->get()->toArray();
        return response()->json($newspapers);
    }
}

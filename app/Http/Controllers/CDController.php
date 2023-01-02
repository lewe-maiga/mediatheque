<?php

namespace App\Http\Controllers;

use App\Models\CD;
use Illuminate\Http\Request;

class CDController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search == "") {
            $cds = CD::all();
            return response()->json($cds);
        }
        $cds = CD::where("title", "LIKE", "%{$search}%")->orWhere("id", "=", $search)->get()->toArray();
        return response()->json($cds);
    }
}

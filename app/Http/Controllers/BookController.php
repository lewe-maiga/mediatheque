<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Microfilm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["api", "index", "show"]);
    }

    /**
     * Display a listing of the resource with a view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view("books.index", [
            "books" => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view("books.create", [
            "authors" => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $author = Author::where("name", "=", $request->author)->first();
            if ($author == null) {
                $author = Author::create([
                    "name" => $request->author,
                ]);
            }
            $microfilm = null;
            if ($request->has("duration")) {
                $microfilm = Microfilm::create([
                    "duration" => $request->duration
                ]);
            }
            $book = Book::create([
                "title" => $request->title,
                "address" => $request->address,
                "category" => $request->category,
                "summary" => $request->summary,
                "special" => $request->has("special") ? true : false,
                "isAvailable" => true,
                "isLost" => false,
                "librarian_id" => $request->user()->id,
                "author_id" => $author->id,
                "microfilm_id" => $request->has("duration") ? $microfilm->id : null,
            ]);
            DB::commit();
            return view("books.edit", $book);
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view("books.show", [
            "book" => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view("books.edit", [
            "book" => $book,
            "authors" => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        DB::beginTransaction();
        try {
            $author = Author::where("name", "=", $request->author)->first();
            if ($author == null) {
                $author = Author::create([
                    "name" => $request->author,
                ]);
            }
            $microfilm = $book->microfilm;
            if ($request->has("duration")) {
                if ($microfilm == null) {
                    $microfilm = Microfilm::create([
                        "duration" => $request->duration
                    ]);
                } else {
                    $microfilm->update(["duration" => $request->duration]);
                }
            }
            $book->update([
                "title" => $request->title,
                "address" => $request->address,
                "category" => $request->category,
                "summary" => $request->summary,
                "special" => $request->has("special") ? true : false,
                "isAvailable" => true,
                "isLost" => false,
                "librarian_id" => $request->user()->id,
                "author_id" => $author->id,
                "microfilm_id" => $request->has("duration") ? $microfilm->id : null,
            ]);
            DB::commit();
            return view("books.edit", $book);
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Display a listing resource in json.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function api(Request $request)
    {
        $search = $request->search;
        if ($search == "") {
            $books = Book::all();
            return response()->json($books);
        }
        $books = Book::where("title", "LIKE", "%{$search}%")->orWhere("id", "=", $search)->get()->toArray();
        return response()->json($books);
    }
}

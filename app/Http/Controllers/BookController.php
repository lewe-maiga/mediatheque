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
        $this->middleware("auth")->except("index");
    }
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search == "") {
            $books = Book::all();
            return response()->json($books);
        }
        $books = Book::where("title", "LIKE", "%{$search}%")->orWhere("id", "=", $search)->get()->toArray();
        return response()->json($books);
    }

    public function create()
    {
        $authors = Author::all();
        return view("books.create", [
            "authors" => $authors
        ]);
    }


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
            Book::create([
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
            return redirect("welcome");
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function show(Book $book)
    {
        // dd($book);
        $authors = Author::all();
        return view("books.show", [
            "book" => $book,
            "authors" => $authors

        ]);
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view("books.edit", [
            "book" => $book,
            "authors" => $authors

        ]);
    }

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
            return redirect("/");
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}

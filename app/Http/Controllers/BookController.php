<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::paginate(10);
        return $books;
    }

    public function show($id)
    {
        $books =  Book::where('id', '=', $id)->paginate(10);
        return $books;
    }

    public function store(Request $request)
    {
        $books = new Book();
        $books['code'] = $request->code;
        $books['title'] = $request->title;
        $books['description'] = $request->description;
        $books['author'] = $request->author;
        $books['publisher'] = $request->publisher;
        $books['publication_year'] = $request->publication_year;
        $books->save();

        return $books;
    }

    public function update(Request $request, $id)
    {
        $books = Book::findOrFail($id);
        $books['code'] = $request->code;
        $books['title'] = $request->title;
        $books['description'] = $request->description;
        $books['author'] = $request->author;
        $books['publisher'] = $request->publisher;
        $books['publication_year'] = $request->publication_year;
        $books->save();

        return $books;
    }

    public function destroy($id)
    {
        Book::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = Book::with(['author', 'category'])->paginate(10);

        return view('list-books', compact('books'));
        

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {

        return view('book-edit', compact('book'));
        
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {


        $validada = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
        ]);

        $book->update($validada);
        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}

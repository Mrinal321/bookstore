<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\MassAssignmentException;


class BookController extends Controller
{
    public function welcome(){
        return view(view: 'welcome');
    }

    public function index(){
        // fetch books data from database
        $books = Book::paginate(10);

        //dd($instructor);

        //pass books data to view

        return view(view: 'books.index')->with('books', $books);
    }

    public function show($book_id){
        $books = Book::find($book_id);

        return view(view: 'books.show')->with('books', $books);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'  => 'required|max:255',
            'isbn'   => 'required|max:12',
            'author' => 'required|max:255',
            'price'  => 'required|numeric',
            'stock'  => 'required|numeric|integer',
        ]);
        
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->save();

        return redirect()->route('books.index');
    }

    public function edit(Request $request, $id){
        $book = Book::find($id);

        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request){
        $request->validate([
            'title'  => 'required|max:255',
            'isbn'   => 'required|max:12',
            'author' => 'required|max:255',
            'price'  => 'required|numeric',
            'stock'  => 'required|numeric|integer',
        ]);

        $book = Book::find($request->id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->save();
        
        return redirect()->route('books.index');
    }

    public function destroy(Request $request, $id){
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index');
    }

}

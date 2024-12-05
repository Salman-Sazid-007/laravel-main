<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index( Request $request)
    {
        if ($request->has('search')){
            $books =  Book::query()
            ->where('title','like','%'.$request->get('search').'%')
            ->orWhere('author','like','%'.$request->get('search').'%')
            ->paginate(10);

        } else{
            $books = Book::paginate(10);
        }

        //$books = Book::paginate(10);
        return view('books.index')
        ->with('books',$books);
    }

    public function show($id){
    $book = Book::find($id);
    return view('books.show')->with('book',$book);
    }
    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        //dd($request->all());

        $request->validate([
            'title' =>'required',
            'author' =>'required',
            'isbn' =>'required|digits:13',
            'stock' =>'required|integer|min:0',
            'price' =>'required|numeric|min:0',
            
        ]);


        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();

        //return redirect()->route('books.index');
        return redirect()->route('books.show', $book->id);


    }
    public function edit($id){
        $book = Book::findOrFail($id);

        return view('books.edit')->with('book',$book);
    }

    public function update(Request $request){
        $request->validate([
            'title' =>'required',
            'author' =>'required',
            'isbn' =>'required|digits:13',
            'stock' =>'required|integer|min:0',
            'price' =>'required|numeric|min:0',
            
        ]);
        $book = Book::findOrFail($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Request $request){
        $book = Book::findOrFail($request->id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
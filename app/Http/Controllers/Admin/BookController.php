<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::get();

        return view('admin.book.index', compact('books'));
    }

    public function create(){
        return view('admin.book.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->description = $request->description;

        $book->save();

        return redirect()->route('book.index');
    }

    public function edit($id){
        $book = Book::findOrFail($id);

        return view('admin.book.edit', compact('book'));
    }

    public function update(Request $request, $id){
        $book = Book::findOrFail($id);

        $book->name = $request->input('name');
        $book->price = $request->input('price');
        $book->description = $request->input('description');

        $book->save();

        return redirect()->route('book.index');
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('book.index');
    }
}

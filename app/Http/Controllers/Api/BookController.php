<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request){
        $book = new Book;
        $book->name = $request->name;
        $book->description = $request->description ?? $book->description;
        $book->price = $request->price;
        $book->save();

        return response()->json($book, 200);
    }

    public function show($id){
        $book = Book::find($id);
        if ($book) {
            return response()->json($book);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        if ($book) {
            $book->name = $request->name ?? $book->name;
            $book->description = $request->description ?? $book->description;
            $book->price = $request->price ?? $book->price;
            $book->save();
            return response()->json($book);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }

    public function delete($id){
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Xóa sách thành công']);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }
}

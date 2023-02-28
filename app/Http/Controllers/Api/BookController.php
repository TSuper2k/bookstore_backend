<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $books = $this->book->get();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('book_images'), $imageName);
        } else {
            $imageName = '';
        }

        $book = $this->book->create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => 'book_images/' . $imageName
        ]);

        return response()->json($book, 200);
    }

    public function show($id)
    {
        $book = $this->book->find($id);
        if ($book) {
            return response()->json($book);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $book = $this->book->find($id);

        if ($book) {
            $imageName = $book->image_path;
            if ($request->has('image_path')) {
                $imageName = time() . '.' . $request->image_path->extension();
                $request->image_path->move(public_path('book_images'), $imageName);
                if (file_exists(public_path($book->image_path))) {
                    unlink(public_path($book->image_path));
                }
            }

            $book->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image_path' => 'book_images/' . $imageName
            ]);
            return response()->json($book);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }

    public function delete($id)
    {
        $book = $this->book->find($id);
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Xóa sách thành công']);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }
}

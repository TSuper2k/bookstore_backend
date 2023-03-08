<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = $this->bookService->createBook($request);

        return response()->json($book, 200);
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);

        if ($book) {
            return response()->json($book);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $book = $this->bookService->updateBook($request, $id);

        if ($book) {
            return response()->json($book);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }

    public function delete($id)
    {
        $result = $this->bookService->deleteBook($id);

        if ($result) {
            return response()->json(['message' => 'Xóa sách thành công']);
        } else {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }
    }
}

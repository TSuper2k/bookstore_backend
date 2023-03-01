<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;

class BookController extends Controller
{
    private $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $books = $this->book->paginate(5);

        return view('admin.book.index', compact('books'));
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(BookStoreRequest $request)
    {
        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('book_images'), $imageName);
        } else {
            $imageName = '';
        }

        $this->book->create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => 'book_images/' . $imageName
        ]);

        return redirect()->route('book.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = $this->book->find($id);

        return view('admin.book.edit', compact('book'));
    }

    public function update(BookUpdateRequest $request, $id)
    {
        $book = $this->book->find($id);

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

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    public function delete($id)
    {
        $this->book->find($id)->delete();

        return redirect()->route('book.index')->with('success', 'Book has been removed.');
    }
}

<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAllBooks()
    {
        return $this->book->get();
    }

    public function createBook($data)
    {

        if ($data->hasFile('image_path')) {
            $imageName = time() . '.' . $data->image_path->extension();
            $data->image_path->move(public_path('book_images'), $imageName);
        } else {
            $imageName = '';
        }

        $book = $this->book->create([
            'name' => $data->name,
            'price' => $data->price,
            'description' => $data->description,
            'image_path' => 'book_images/' . $imageName
        ]);

        return $book;
    }

    public function getBookById($id)
    {
        return $this->book->find($id);
    }

    public function updateBook($data, $id)
    {
        $book = $this->book->find($id);

        if ($book) {
            $imageName = $book->image_path;
            if ($data->has('image_path')) {
                $imageName = time() . '.' . $data->image_path->extension();
                $data->image_path->move(public_path('book_images'), $imageName);
                if (file_exists(public_path($book->image_path))) {
                    unlink(public_path($book->image_path));
                }
            }

            $book->update([
                'name' => $data->name,
                'price' => $data->price,
                'description' => $data->description,
                'image_path' => 'book_images/' . $imageName
            ]);

            return $book;
        }

        return null;
    }

    public function deleteBook($id)
    {
        $book = $this->book->find($id);
        
        if ($book) {
            if (file_exists(public_path($book->image_path))) {
                unlink(public_path($book->image_path));
            }
            $book->delete();
        }
    }
}

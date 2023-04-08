<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function getAll()
    {
        return Book::all();
    }

    public function getById($id)
    {
        return Book::findOrFail($id);
    }

    public function create($data)
    {
        return Book::create($data);
    }

    public function update($id, $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }
}

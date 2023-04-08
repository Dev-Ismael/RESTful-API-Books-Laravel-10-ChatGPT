<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\BookService;


class BookController extends Controller
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = $this->bookService->getById($id);
        return response()->json($book);
    }

    public function store(StoreBookRequest $request)
    {
        $bookData = $request->validated();
        $book = $this->bookService->create($bookData);
        return response()->json($book, 201);
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $bookData = $request->validated();
        $book = $this->bookService->update($id, $bookData);
        return response()->json($book);
    }

    public function destroy($id)
    {
        $this->bookService->delete($id);
        return response()->json(null, 204);
    }
}

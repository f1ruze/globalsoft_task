<?php

namespace App\Http\Controllers;

use App\DataTables\BookDataTable;

use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(BookDataTable $bookDataTable)
    {
        return $bookDataTable->render('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $authors = Author::get();
        return view('books.create' , compact('authors'));
    }

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        return redirect(route('books.show', ['book' => $book->id]));
    }

    public function edit(Book $book)
    {
        $authors = Author::get();
        return view('books.edit', compact('book','authors'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $datas = $request->validated();
        $book->update($datas);

        return redirect(route('books.show', ['book' => $book->id]));
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect(route('books.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\DataTables\BookDataTable;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(BookDataTable $authorDataTable)
    {
        return $authorDataTable->render('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact());
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return redirect(route('authors.show', ['author' => $author->id]));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $datas = $request->validated();
        $author->update($datas);

        return redirect(route('authors.show', ['author' => $author->id]));
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect(route('authors.index'));
    }
}

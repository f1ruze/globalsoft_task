<?php

namespace App\Http\Controllers;

use App\DataTables\AuthorDataTable;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;

class AuthorController extends Controller
{
    public function index(AuthorDataTable $authorDataTable)
    {
        return $authorDataTable->render('authors.index');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function create()
    {
        return view('authors.create');
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

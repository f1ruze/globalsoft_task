<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store()
    {

    }

    public function edit()
    {
        return view('authors.edit');
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::limit(100)->get();
        return view('authors/authors', compact('authors'));
    }

    public function create()
    {
        return view('index/index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $author = new Author();
        // dd('IT WORKS');
        $author->name = $request->input('name');
        $author->slug = $request->input('name');
        $author->save();

        session()->flash('success_message', "The author was successfuly added.");
        return redirect()->route('home');
    }
}

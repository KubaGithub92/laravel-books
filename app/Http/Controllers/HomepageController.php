<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomepageController extends Controller
{
    public function displayHome()
    {
        $crime_books = Book::where('category_2_id', 12)
            // ->with(['authors', 'publishers'])
            ->orderBy('publication_date', 'desc')
            ->limit(10)
            ->get();

        $crime_books->loadMissing(['authors', 'publishers']);
        return view('index/index', compact('crime_books'));
    }
}

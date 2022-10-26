<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
// use App\Http\Controllers\Review;

class BookController extends Controller
{
    public function show($book_id)
    {
        $book = Book::findOrFail($book_id);

        return view('book/show', compact('book'));
    }

    public function saveReview(Request $request, $book_id)
    {
        $this->validate($request, [
            'text' => [
                'required',
                'max:255',

                // custom validation function
                function ($attribute, $value, $fail) use ($book_id) {
                    //  try to select an existing review of this book and this user
                    $existing_review = Review::where('book_id', $book_id)->where('user_id', Auth::id())->first();

                    if ($existing_review) {
                        // if we found that review, validation fails
                        $fail('You have already reviewed this book!');
                    }
                }
            ]
        ], [
            'text.max' => 'TOO LONG TEXT!!! 255 characters max!'
        ]);
        // make new object
        $review = new Review;
        // fill with data
        $review->book_id = $book_id;
        $review->user_id = Auth::id();
        $review->text = $request->post('text');
        // save it - does the insert query
        $review->save();

        session()->flash('success_message', "Review saved. Thanks for contributing.");
        return redirect()->route('book.show', $book_id);
    }
}

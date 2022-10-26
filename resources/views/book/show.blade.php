@extends('layouts/main',[
  'title'=>'Book detail'
])
@section('content')
<h1>{{$book->title}}</h1>

<div class="author">by {{$book->authors->pluck('name')->join(', ')}}</div>

<img src="{{$book->image}}" alt="book cover">

@auth

@include('common.errors')

@if (session()->has('success_message'))
    <div class="success-message">{{session()->get('success_message')}}</div>
@endif

<form action="{{route('book.save-review',$book->id)}}" method="post">
  @csrf
  <textarea name="text" id="" cols="30" rows="10">{{old('text')}}</textarea>
  <button>Submit review</button>
</form>
@endauth

<h2>Reviews</h2>
@foreach ($book->reviews as $review)
    <div class="review">
      <p>{{$review->text}}</p>
      written by {{$review->user->name}}
    </div>
@endforeach
@endsection
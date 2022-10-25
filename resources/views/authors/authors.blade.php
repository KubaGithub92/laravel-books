@extends('layouts\main')
@section('content')
     <h1>Authors</h1>

     <ul>
      @foreach ($authors as $author)
          <li>{{$author->name}}</li>
      @endforeach
     </ul>
@endsection

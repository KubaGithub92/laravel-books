@extends('layouts\main', [
  'title' => "Home",
  'current_menu_item' =>'register'
])

@section('content')

      <h1>Books project</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae temporibus, commodi aspernatur reiciendis ea consectetur obcaecati similique consequatur beatae quae ullam error architecto cumque quisquam doloremque aliquam illum odit iure sapiente laudantium?</p>
      <form action="{{route('store')}}" method="post">
        @csrf
        <div>Author's name</div>
        <input type="text" name="name" style="color: black"><br>
        <button type=submit class="text-gray-700">Add new author</button>
      </form>
      
      @if($message = Session::get("success_message"))
      {{$message}}
      @endif
      
      <div id='partners'></div>
      <div id="latest-books" class="main-container">
      </div>

        
        @viteReactRefresh
        @vite('resources/js/partners.jsx')
        @vite('resources/js/latest-books.js')

      <h2>Crime Books</h2>
      <div class="main-container">
        @foreach ($crime_books as $book)
        {{-- {{dd($crime_books)}} --}}
        <div class="book-container">
          <h3>{{$book->title}}</h2>
          <div class="content-container">
            <img src="{{$book->image}}" alt="cover of a book" />
            <div>
              <div class="author">{{ $book->authors->pluck('name')->join(', ') }}</div>
              <div class="author">published by {{ $book->publishers->pluck('name')->join(', ')}}</div>
              <div class="description">{!! $book->description !!}</div>
            </div>
          </div>
        </div>
        
        @endforeach
      </div>
@endsection
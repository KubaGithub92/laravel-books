@extends('layouts\main')

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
      <div id="latest-books" class="main-container"></div>

      @viteReactRefresh
      @vite('resources/js/partners.jsx')
      @vite('resources/js/latest-books.js')

@endsection
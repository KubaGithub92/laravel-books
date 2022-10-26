  <style>
    form{
      display: inline-block;
    }
  </style>
  <nav class="text-gray-900 text-lg">
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('about')}}">About</a>

    <form action="{{ route('logout') }}" method="post">
 
    @csrf

    @guest
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>

    @endguest

    @auth
       <button>Logout</button>
    @endauth
    </form>

    {{-- @if(auth()->check()) --}}
    @auth
      Logged in as: {{auth()->user()->name}}
    @endauth
    {{-- @endif --}}

  </nav>
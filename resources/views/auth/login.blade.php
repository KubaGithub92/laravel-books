@extends('layouts\main', [
  'title' => "Login",
])

@section('content')

@include('common.errors')

<form action="{{ route('login') }}" method="post">
 
    @csrf
    <div>Email</div>
    <input type="email" name="email" value="{{ old('email') }}">
    <div>Password</div>
    <input type="password" name="password" value="">
    <br>
    <button>Login</button>
 
</form>

@endsection
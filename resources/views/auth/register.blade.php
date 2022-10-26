@extends('layouts\main', [
  'title' => "Register",
])

@section('content')

@include('common.errors')

<form action="{{ route('register') }}" method="post">
 
    @csrf
    <label for="name">Name</label>
    <br>
    <input type="text" name="name" value="{{ old('name') }}">
    <br>

    <label for="name">Email</label>
    <br>
    <input type="email" name="email" value="{{ old('email') }}">
    <br>

    <label for="name">Password</label>
    <br>
    <input type="password" name="password" value="">
    <br>

    <label for="name">Password confirmation</label>
    <br>
    <input type="password" name="password_confirmation" value=""> 
    <br>

    <button>Register</button>
 
</form>
@endsection
@extends('auth.layout')

@section('title', 'Login')

@section('form')
    <form action="/sign-in" method="post">
        @if(session()->has('message'))
            <div class="alert alert-danger " role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') ?? '' }}" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-dark">Login</button>
        <button class="btn btn-secondary"><a style="color: #FFFFFF" href="/register">Register</a></button>
        @csrf
    </form>
@endsection
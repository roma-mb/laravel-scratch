@extends('auth.layout')

@section('title', 'Register')

@section('form')
    <form action="/register" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
            {{$errors->first('name')}}
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail">
            {{$errors->first('email')}}
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
            {{$errors->first('password')}}
        </div>
        <button type="submit" class="btn btn-dark">Create</button>
        @csrf
    </form>
@endsection
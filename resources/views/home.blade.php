@extends('layout')

@section('title', 'Welcome')

@section('content')
    <div class="row">
        <div class="col-12">
    <div>
        <h3 class="pl-4 pt-2">Hello {{ formatName(\Illuminate\Support\Facades\Auth::user()->name ?? '') }}</h3>
        <h3 class="pl-4">Welcome to laravel 8.</h3>
{{--        Using JavaScript & CSS Scaffolding, Vue--}}
{{--        <h1 class="my-class-test">Welcome to laravel 8.</h1>--}}
{{--        <my-button--}}
{{--            text="Send"--}}
{{--            type="submit"--}}
{{--        />--}}
    </div>
    </div>
@endsection

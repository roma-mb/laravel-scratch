@extends('layout')


@section('content')
    <h1>Customers</h1>

    <ul>
        @foreach ($customer as $item)
            <li> {{$item}} </li>    
        @endforeach
    </ul>
@endsection

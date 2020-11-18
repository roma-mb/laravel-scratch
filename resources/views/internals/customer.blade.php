@extends('layout')


@section('content')
    <h1>Customers</h1>

    <form action="customers" method="POST" class="pb-5">
        <div class="input-group">
            <input type="text" name="name">
        </div>

        <div>{{ $errors->first('name') }}</div>

        <button type="submit">Add</button>
        @csrf
    </form>

    <ul>
        @foreach ($customer as $item)
            <li> {{$item->name}} </li>
        @endforeach
    </ul>
@endsection

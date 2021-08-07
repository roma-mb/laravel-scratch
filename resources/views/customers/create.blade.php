@extends('layout')

@section('title', 'Add New Customer')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add New Customer</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
{{--            divides into multiple parts and send to server.--}}
            <form action="/customers" method="POST" enctype="multipart/form-data">
                @include('customers.form')

                <button type="submit" class="btn btn-dark">Add</button>
            </form>
        </div>
    </div>
@endsection

@extends('layout')

{{--
    @section('title')
        Customer List
    @endsection
--}}

{{--another--}}

@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <p><a href="customers/create">Add New Customer</a></p>
        </div>
    </div>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2">{{ $customer->id }}</div>
            <div class="col-4">
                <a href="customers/{{ $customer->id }}">{{ $customer->name }}</a>
            </div>
            <div class="col-4">{{ $customer->company->name }}</div>
            <div class="col-2">{{ $customer->active }}</div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 mt-5 d-flex justify-content-center">
            {{ $customers->onEachSide(1)->links() }}
        </div>
    </div>
@endsection

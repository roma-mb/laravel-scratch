@extends('layout')

@section('title', 'Contact Us')

@section('content')
   @if(!session()->has('message'))
       <form action="/contact" method="POST">
           <div class="row">
               <div class="col-12">
                   <h1>Contact Us</h1>
               </div>
           </div>

           <div class="form-group">
               <label>Name:</label>
               <input type="text" name="name" value="{{ old('name') }}" class="form-control">
               {{ $errors->first('name') }}
           </div>

           <div class="form-group">
               <label>Email:</label>
               <input type="text" name="email" value="{{ old('email') }}" class="form-control">
               {{ $errors->first('email') }}
           </div>

           <div class="form-group">
               <label>Message:</label>
               <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ old('email') }}</textarea>
               {{ $errors->first('email') }}
           </div>

           @csrf
           <button type="submit" class="btn btn-dark">Send Message</button>
       </form>
   @endif
@endsection

@extends('layouts.master')



@section('content')
<section class="jumbotron text-center">
<div class="album py-5 bg-light">

        <div class="container">
        <h1 class="jumbotron-heading text-center">Sing up</h1>
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <li>{{$error}}</li>
        </div>
        @endforeach
<form method="POST" action="/singup">
  {{csrf_field()}}
    <div class="form-group">
      
      <input type="text" class="form-control"  placeholder="Enter First-Name" name="First-Name" value="{{ old('First-Name') }}" >
    </div>
    <div class="form-group">
      
      <input type="text" class="form-control"  placeholder="Enter Last-Name" name="Last-Name" value="{{ old('Last-Name') }}">
    </div>
    <div class="form-group">
      
      <input type="tel" class="form-control"  placeholder="Enter Phone number" name="phone" value="{{ old('phone') }}">
    </div>
    <div class="form-group">
      
      <input type="email" class="form-control"  placeholder="Enter email" name="email"  value="{{ old('email') }}">
    </div>
    <div class="form-group">
      
      <input type="password" class="form-control" name="password" placeholder="Enter password"  value="{{ old('password') }}" >
    </div>
    <div class="form-group">
      
      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm the password" value="{{ old('confpassword') }}" >
    </div>
    
    <button type="submit" class="btn btn-success">SingUp</button>
  </form>
  </div>
  </div>
</section>
            @endsection

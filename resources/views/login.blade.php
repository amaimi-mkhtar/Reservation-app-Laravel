
@extends('layouts.master')



@section('content')
<section class="jumbotron text-center">
<div class="album py-5 bg-light">

        <div class="container">
        <h1 class="jumbotron-heading text-center">Log in</h1>
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{$error}}
        </div>
        @endforeach
<form method="POST" action="/login">
  {{csrf_field()}}
    <div class="form-group">
      
      <input type="email" class="form-control"  placeholder="Enter email" name="email" value=" {{old('email')}} ">
    </div>
    <div class="form-group">
     
      <input type="password" class="form-control" name="password" placeholder="Enter password" >
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-success">Log in</button>
  </form>
  </div>
  </div>
</section>
            @endsection

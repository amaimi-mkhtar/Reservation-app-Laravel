<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

@extends('layouts.master')



@section('content')
<section class="jumbotron text-center">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{ url('/images/salon/salon.jpg') }}" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="{{ url('/images/salon/salon.jpg') }}" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="{{ url('/images/salon/salon.jpg') }}" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</section>
<div class="container">

@if ($error = $errors->first('login'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ $error }}
                        </div>
    @endif
@if ($error = $errors->first('singup'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ $error }}
                        </div>
 @endif
 @if ($error = $errors->first('confirmed'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ $error }}
                        </div>
 @endif
                    </div>
<div class="album py-5 bg-light">
        <div class="container">
        <h2 class="jumbotron-heading">Salons</h2>
            <div class="row">
            
              </div>
             
        </div>
        
</div>

            @endsection

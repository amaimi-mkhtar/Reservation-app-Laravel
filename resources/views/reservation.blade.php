
@extends('layouts.master')



@section('content')
<section class="jumbotron ">
<div class=" py-2 bg-light">
<div >
          
          <h1 class="jumbotron-heading text-center ">RESERVATION</h1>
          <hr>
          @foreach($errors->all() as $error)
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{$error}}
            </div> 
            <hr>
          @endforeach 

          </div>

          
    <div  >
    <div class="row" >
    <div class="col-md-4">

    @if($prestation->prestation_image === "")
                    <img class="card-img-top" src="{{ url('/images/salon/salon.jpg') }}" height="180px" 
                     alt="Card image cap">
                     @else
                     <img class="card-img-top" src="{{ url('/images/Prestation/'.$prestation->prestation_image) }}" height="250px" 
                     alt="Card image cap">
                     @endif  
    </div>
    <div class="col-md-6">
    <div class="row">
          <div class="col-sm-6" ><p class="lead text-muted " >
          Nome: <span class="text-success">{{Auth::user()->name}} {{Auth::user()->PRENOM}}</span></p></div>
          <div class="col-sm-6" > <p class="lead text-muted" >
          Email: <span class="text-success">{{Auth::user()->email}}</span></p></div>
    </div>
    <hr>
    <div class="row">
          <div class="col-sm-6" > <p class="lead text-muted" >
          Salon: <span class="text-success">{{$salon->NAME_SALON}}</span></p></div>

          <div class="col-sm-6" > <p class="lead text-muted" >
          Adresse: <span class="text-success">{{$salon->ADRESSE}}</span></p></div>
    </div>
    <hr>
    <div class="row">
         <div class="col-sm-6" > <p class="lead text-muted" >
          Coiffeur: <span class="text-success">{{$coiffeur->NOM_COIFFEUR}}</span></p></div>

          <div class="col-sm-6" > <p class="lead text-muted" >
          Tel_coiffeur: <span class="text-success">{{$coiffeur->TEL_COIFFEUR }}</span></p></div>
    </div>
    <hr>
    <div class="row">
          
          <div class="col-sm-6" > <p class="lead text-muted" >
          Nom_Prestation: <span class="text-success">{{$prestation->NOM_PRESTATION}}</span></p></div>
          <div class="col-sm-6" > <p class="lead text-muted" >
         Prix_Prestation: <span class="text-success">{{$prestation->prix_prestation }}$</span></p></div>
          
    </div>
    
    </div>
    </div>
    
    </div>
    <hr>
   
  
          </div>
    @include('calendrie')
          
          
</section>


       


            @endsection

@extends('layouts.master')



@section('content')
<style>

.jumbotron {
    background-image: url("{{ url('/images/backgrounds/welbg2.jpg') }}");
      background-size: cover;
      padding-top: 20%;
      padding-bottom: 20%;
    }
  

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  float: left;
  width: 80%;
  border:0px;
  background: rgba(255,255,255,0.4);
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  border:0px;
  padding: 10px;
  background: gray;
  color: white;
  font-size: 17px;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<section class="jumbotron text-center" id="welcombg">
  <div class="container">
    <h1 class="jumbotron-heading">System de Reservation</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <div class="container">
<div class="col-md-12">
  
   <!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The form -->
<form class="example" method="post" action="/search">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit" class="bg-dark"><i class="fa fa-search "></i></button>
</form> 
  
  
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
@if(count($salons))
        <div class="container">
    
        <h2 class="jumbotron-heading">Salons</h2>
            <div class="row">

                @foreach($salons as $salon)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    @if($salon->image_salon === "")
                    <img class="card-img-top" src="{{ url('/images/salon/salon.jpg') }}" height="250px" 
                     alt="Card image cap">   
                    @else
                    <img class="card-img-top" src="{{ url('/images/salon/'. $salon->image_salon) }}"  height="250px" alt="Card image cap">
                    
                    @endif
                    <div class="card-body">
                        <h4 class="card-text text-dark text-center" >{{ $salon->NAME_SALON}}</h4>
                        <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $salon->TEMPS_OUVERTEUR}} - {{ $salon->TEMPS_FERMETEUR}} </small>
                        <a href="{{$salon->NAME_SALON}}" class="btn btn-dark">Details</a>
                        </div>
                    </div>
                    </div>
                    </div>
                    
                @endforeach
                </div>
                @endif


                @if(count($coiffeurs))
                <div class="container">
        <h2 class="jumbotron-heading">Coiffeurs</h2>
            <div class="row">

                 @foreach($coiffeurs as $coiffeur)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    @if($coiffeur->coiffeur_image === "")
                    <img class="card-img-top" src="{{ url('/images/salon/salon.jpg') }}" height="250px" 
                     alt="Card image cap">
                     @else
                     <img class="card-img-top" src="{{ url('/images/coiffeur/'.$coiffeur->coiffeur_image) }}" height="250px" 
                     alt="Card image cap">
                     @endif   
                    
                    <div class="card-body">
                        <h4 class="card-text text-dark text-center" >{{ $coiffeur->NOM_COIFFEUR}}</h4>
                        <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{$coiffeur->TEL_COIFFEUR}}</small>
                        <div class="btn-group">
                            <a  class="btn btn-sm btn-outline-secondary" href="{{$coiffeur->NAME_SALON}}/{{$coiffeur->NOM_COIFFEUR}}">Prestations</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                </div>
                @endif

                @if(count($prestations))
        <div class="container">
    
        <h2 class="jumbotron-heading">Prestations</h2>
            <div class="row">

                 @foreach($prestations as $prestation)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    @if($prestation->prestation_image === "")
                    <img class="card-img-top" src="{{ url('/images/salon/salon.jpg') }}" height="250px" 
                     alt="Card image cap">
                     @else
                     <img class="card-img-top" src="{{ url('/images/Prestation/'.$prestation->prestation_image) }}" height="250px" 
                     alt="Card image cap">
                     @endif   
                    
                    <div class="card-body">
                        <h4 class="card-text text-dark text-center" >{{ $prestation->NOM_PRESTATION}}</h4>
                        <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">PRIX :<span class="text-success">{{$prestation->prix_prestation }}$</span> </small>
                        <small class="text-muted">Sexe :<span class="text-success">{{$prestation->Sex_prestation}}</span></small>
                        <small class="text-muted">Durée :<span class="text-success">{{$prestation->duree }} min</span></small>
                        <?php $coiffeur= \App\coiffeur::where('NOM_COIFFEUR','=',$prestation->NOM_COIFFEUR)->first(); ?>
                        <a href="/{{$coiffeur->NAME_SALON}}/{{$prestation->NOM_COIFFEUR}}/{{$prestation->id_prestation}}" class="btn btn-dark">Reserver</a>
                        </div>
                        </div>
                    </div>
                    </div>
                
                @endforeach
                    </div>
                @endif
                



               
        
                
              </div>
             
        </div>
        
</div>

            @endsection

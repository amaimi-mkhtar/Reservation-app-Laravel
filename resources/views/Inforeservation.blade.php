
@extends('layouts.master')



@section('content')
<section class="jumbotron ">
<div class=" py-2 bg-light">
<div class="container ">
          
          <h1 class="jumbotron-heading text-center ">Resevation Informations</h1>
          <hr>
          @foreach($errors->all() as $error)
            <div class="alert alert-danger">
              <li>{{$error}}</li>
            </div> 
            <hr>
          @endforeach 

          </div>
          
    <div class="container ">
    
    <div class="row">
          <div class="col-sm-6" style="background-color:lavender;"><p class="lead text-muted " >
          Nome: <span class="text-success">{{Auth::user()->name}} {{Auth::user()->PRENOM}}</span></p></div>
          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
          Email: <span class="text-success">{{Auth::user()->email}}</span></p></div>
    </div>
    <hr>
    <div class="row">
          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
          Salon: <span class="text-success">{{$salon->NAME_SALON}}</span></p></div>

          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
          Adresse: <span class="text-success">{{$salon->ADRESSE}}</span></p></div>
    </div>
    <hr>
    <div class="row">
         <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
          Coiffeur: <span class="text-success">{{$coiffeur->NOM_COIFFEUR}}</span></p></div>

          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
          Tel_coiffeur: <span class="text-success">{{$coiffeur->TEL_COIFFEUR }}</span></p></div>
    </div>
    <hr>
    <div class="row">
          
          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
          Nom_Prestation: <span class="text-success">{{$prestation->NOM_PRESTATION}}</span></p></div>
          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
         Prix_Prestation: <span class="text-success">{{$prestation->prix_prestation }}$</span></p></div>
          
    </div>
    <hr>
    <div class="row">
          
          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
          Date_Reservation: <span class="text-success">{{$reservation->DATE}}</span></p></div>
          <div class="col-sm-6" style="background-color:lavender;"> <p class="lead text-muted" >
         Heure-Reservation: <span class="text-success">{{$reservation->HEURE}}</span></p></div> 
        
            
          
    </div>
    <hr>
    @if($reservation->statu == "confirmer" || $reservation->statu == "en attent" )
  
    <div class=" row">
    <div class=" col-sm-12 text-center" > <a href="/Annuler_reservation/{{$reservation->ID_RESERVATION}}" class="btn btn-danger  " role="button">
         Annuler la reservation </a></div>
         </div>
    <hr>
      @endif
    


</div>
                
                
          </div>
          
          
          </form>
          
          </div>
   







          
  
  
  
  
 
  
          </div>
</section>
            @endsection
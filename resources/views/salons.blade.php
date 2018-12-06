
@extends('layouts.master')



@section('content')


<style>
#bg {
    
    /* The image used */
    background-image: url("{{ url('/images/salon/'. $salon->image_salon) }}");

    /* Half height */
    padding-top:15%;
    padding-bottom:15%;
    min-height: 100px; 
    /* Center and scale the image nicely */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

#coiffeursbg{
   /* background-image: url("{{ url('/images/backgrounds/bgcoiffeurs.jpg') }}");*/

    /* Half height */
    
   
    /* Center and scale the image nicely */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}

</style>
<section class="jumbotron " id="bg">      
<div class="container text-center"> 
<h1 class="jumbotron-heading " >Salon: <span  style="color:white;">{{strtoupper($salon->NAME_SALON)}}</span></h1>
</div>
        
                  
                 
                  
 
<table class="table table-hover table-dark">
<tbody>
<tr>
        <td style="padding:0px;"><p class="lead text-muted" > Adresse:</span></p></td>
        <td style="padding:0px;"><p class="lead text-muted" ><span  style="color:white;"> {{$salon->ADRESSE}}</span></p></td>

        <td style="padding:0px;"><p class="lead text-muted" > Temps_ouverteur:</span></p></td>
        <td style="padding:0px;"><p class="lead text-muted" ><span  style="color:white;"> {{$salon->TEMPS_OUVERTEUR}}</span></p></td>

        <td style="padding:0px;"><p class="lead text-muted" > Temps_fermeteur:</span></p></td>
        <td style="padding:0px;"><p class="lead text-muted" ><span  style="color:white;"> {{$salon->TEMPS_FERMETEUR}}</span></p></td>

        <td style="padding:0px;"><p class="lead text-muted" > TEL_manger:</span></p></td>
        <td style="padding:0px;"><p class="lead text-muted" ><span  style="color:white;"> {{$salon->MANAGER_TEL}}</span></p></td>
</tr>
</tbody>
</table>

</section>

<div class="album py-5 bg-light" id="coiffeursbg">

        <div class="container">
        <h2 class="jumbotron-heading">Coiffeurs</h2>
        @if(count($coiffeurs))
        
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
                            <a  class="btn btn-sm btn-outline-secondary" href="{{$salon->NAME_SALON}}/{{$coiffeur->NOM_COIFFEUR}}">Prestations</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
              </div>
              @else
              <div class="alert alert-danger">
                  <strong>!</strong> Salon  sans coiffeurs
              </div>
              @endif
        </div>
</div>
            @endsection
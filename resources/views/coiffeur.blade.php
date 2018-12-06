
@extends('layouts.master')



@section('content')






<section class="jumbotron ">
    <div class="container-fluid text-center">    
        <div class="row content  bg-light">
            <div class="col-sm-2 sidenav">
            <hr>
            <table class="table table-dark">
                <tbody >
                    <tr style="padding:0px;border:0px;" colspan="2">
                    <img class="card-img-top" src="{{ url('/images/coiffeur/'.$coiffeur->coiffeur_image) }}" height="180px" 
                     alt="Card image cap">
                    </tr>
                    <tr style="padding:0px;border:0px;" colspan="2">
                    <td > <h2 class="jumbotron-heading">{{$coiffeur->NOM_COIFFEUR}}</h2></td>
                    </tr>
                    <tr ><td><p class="lead text-muted" >SALON</p></td></tr>
                    <tr style="padding:0px;border:0px;"><td><p class="lead text-muted" > <span class="text-success">{{$salon->NAME_SALON}}</span></p></td></tr>
                    <tr ><td><p class="lead text-muted" >TEL_coiffeur </p></td></tr>
                    <tr style="padding:0px;border:0px;"><td><p class="lead text-muted" ><span class="text-success">+121 {{$coiffeur->TEL_COIFFEUR}} </span></p></td></tr>
                    <tr ><td><p class="lead text-muted" >TEL_manger_Salon</p></td></tr>
                    <tr style="padding:0px;border:0px;"><td> <p class="lead text-muted" > <span class="text-success">+121 {{$salon->MANAGER_TEL}}</span></p></td></tr>
                    <tr ><td><p class="lead text-muted" >Adresse_Salon </p></td></tr>
                    <tr style="padding:0px;border:0px;"><td><p class="lead text-muted" ><span class="text-success">{{$salon->ADRESSE}}</span></p></td></tr>

                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left">
            <hr> 
            <h2 class="jumbotron-heading">Prestations</h2>
                            <hr>
           

          

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
                        <a href="/{{$salon->NAME_SALON}}/{{$coiffeur->NOM_COIFFEUR}}/{{$prestation->id_prestation}}" class="btn btn-dark">Reserver</a>
                        </div>
                        </div>
                    </div>
                    </div>
                
                @endforeach
                </div>
                        
                            </div>
                        </div>
                    </div>










            @endsection

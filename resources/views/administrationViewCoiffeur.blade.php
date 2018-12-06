
@extends('layouts.adminmaster')



@section('content')
<section class="jumbotron ">
    <div class="container-fluid text-center">    
        <div class="row content  bg-light">
        
            <div class="col-sm-2 sidenav">
            <hr>
            <table class="table table-dark">
                <tbody >
                    <tr style="padding:0px;border:0px;" colspan="2">
                    <td > <h2 class="jumbotron-heading">Coiffeurs</h2></td>
                    </tr>
                    <tr style="padding:0px;border:0px;" colspan="2">
                           
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/coiffeurs" class="lead text-muted" style="color:gray;">Consulter</a></td>
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/coiffeurs/ajouter" class="lead text-muted" style="color:gray;">ajouter</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-10">
                            <h2 class="jumbotron-heading text-center">Coiffeur:{{$coiffeur->NOM_COIFFEUR}}</h2>
                            </div>
                         
                
            </div>
            
                            <hr>
                       
          

                    <div class="container-fluid ">    
                        <div class="row content ">
                        <div class="col-sm-4">
                    @if($coiffeur->coiffeur_image === "")
                    <img class="card-img-top " src="{{ url('/images/salon/salon.jpg') }}" height="250px" 
                     alt="Card image cap">
                     @else
                     <img class="card-img-top " src="{{ url('/images/coiffeur/'.$coiffeur->coiffeur_image) }}" height="250px" 
                     alt="Card image cap">
                     @endif
                    
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td>Salon:</td>
                    <td><span class="text-success">{{$coiffeur->NAME_SALON}}</span></td>
                    </tr> 
                    <tr>
                    <td >TEL:</td>
                    <td><span class="text-success">{{$coiffeur->TEL_COIFFEUR }}</span></td>
                    </tr>   
                    </tbody>
                    </table>
                      </div>
                      <div class="col-sm-5">
                      <table class="table table-striped table-hover  table-dark text-center">
                        <tbody>
                        <tr>
                      <td><h3 class="jumbotron-heading ">Prestations</h3></td>
                      </tr>
                      @foreach($prestations as $prestation)
                      <tr>
                      <td><p class=" text-primary">{{$prestation}}</p></td>
                      </tr>
                      @endforeach
                      <tbody>
                      </table>
                      </div>
                      </div>
                      </div>
                        
                            </div>
                        </div>
                    </div>
</section>  
  
            @endsection
 
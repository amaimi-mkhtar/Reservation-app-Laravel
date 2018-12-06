
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
                    <td > <h2 class="jumbotron-heading">Prestations</h2></td>
                    </tr>
                    <tr style="padding:0px;border:0px;" colspan="2">
                           
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/prestations" class="lead text-muted" style="color:gray;">Consulter</a></td>
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/prestation/ajouter" class="lead text-muted" style="color:gray;">ajouter</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-10">
                            <h2 class="jumbotron-heading text-center">Presatation:{{$prestation->NOM_PRESTATION}}</h2>
                            </div>
                         
                
            </div>
            
                            <hr>
           

          

                    <div class="container-fluid ">    
                        <div class="row content ">
                    <div class="col-sm-5">
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td>Coiffeur:</td>
                    <td><span class="text-success">{{$prestation->NOM_COIFFEUR }}</span></td>
                    </tr> 
                    <tr>
                    <td >Description:</td>
                    <td><span class="text-success">{{$prestation->description_prestation}}</span></td>
                    </tr>
                    <tr>
                    <td >Prix:</td>
                    <td><span class="text-success">{{$prestation->prix_prestation }}$</span></td>
                    </tr>
                    <tr>
                    <td >Sexe_prestation :</td>
                    <td><span class="text-success">{{$prestation->Sex_prestation }}</span></td>
                    </tr>
                    <tr>
                    <td >Duree :</td>
                    <td><span class="text-success">{{$prestation->duree  }} min</span></td>
                    </tr>      
                    </tbody>
                    </table>
                      </div>
                      <div class="col-sm-5">
                      
                     
                      <img class="card-img-top img-thumbnail"
                      src="{{ url('/images/Prestation/'.$prestation->prestation_image) }}" 
                      height="250px" 
                     alt="No image">
                      
                      </div>
                      </div>
                      </div>
                        
                            </div>
                        </div>
                    </div>
</section>  
  
            @endsection
 
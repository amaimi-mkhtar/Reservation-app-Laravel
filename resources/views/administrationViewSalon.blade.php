
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
                    <td > <h2 class="jumbotron-heading">Salons</h2></td>
                    </tr>
                    <tr style="padding:0px;border:0px;" colspan="2">
                           
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/salons" class="lead text-muted" style="color:gray;">Consulter</a></td>
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/salons/ajouter" class="lead text-muted" style="color:gray;">ajouter</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-10">
                            <h2 class="jumbotron-heading text-center">SALON:{{$salon->NAME_SALON}}</h2>
                            </div>
                         
                
            </div>
            
                            <hr>
           

          

                    <div class="container-fluid ">    
                        <div class="row content ">
                    <div class="col-sm-5">
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td >Adresse:</td>
                    <td><span class="text-success">{{$salon->ADRESSE}}</span></td>
                    </tr>   
                    <tr>
                    <td>Temps_ouverteur:</td>
                    <td><span class="text-success">{{$salon->TEMPS_OUVERTEUR}}</span></td>
                    </tr>                  
                    <tr>
                    <td>Temps_fermeteur:</td>
                    <td><span class="text-success">{{$salon->TEMPS_FERMETEUR}}</span></td>
                    </tr> 
                    <td>TEL_manger: </td>
                    <td><span class="text-success">{{$salon->MANAGER_TEL}}</span></td>
                    </tr> 
                    </tbody>
                    </table>
                      </div>
                      <div class="col-sm-5">
                      <table class="table table-striped table-hover  table-dark text-center">
                        <tbody>
                        <tr>
                      <td><h3 class="jumbotron-heading ">Coiffeurs</h3></td>
                      </tr>
                      @foreach($coiffeurs as $coiffeur)
                      <tr>
                      <td><a href="/administration/coiffeurs/view/{{$coiffeur->ID_COIFFEUR}}"><p class=" text-primary">{{$coiffeur->NOM_COIFFEUR}}</p></a></td>
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
 
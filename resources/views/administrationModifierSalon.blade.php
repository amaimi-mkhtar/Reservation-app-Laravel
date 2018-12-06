
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
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p>{{$error}}</p>
                            </div>
                            @endforeach

          

                    <div class="container-fluid ">    
                        <div class="row content ">
                    <div class="col-sm-8">
                    <form method="POST" action="/administration/modifierSalon" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="text" name="id_salon" value="{{$salon->ID_SALON}}" hidden>
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td >Name:</td>
                    <td><input type="text" class="form-control" name="salon_name" value="{{$salon->NAME_SALON}}"></td>
                    </tr> 
                    <tr>
                    <td >Adresse:</td>
                    <td><input type="text" class="form-control" name="adresse" value="{{$salon->ADRESSE}}"></td>
                    </tr>   
                    <tr>
                    <td>Temps_ouverteur:</td>
                    <td><input type="time"  class="form-control" name="temps_over" value="{{$salon->TEMPS_OUVERTEUR}}"></td>
                    </tr>                  
                    <tr>
                    <td>Temps_fermeteur:</td>
                    <td><input type="time" class="form-control" name="temps_ferm" value="{{$salon->TEMPS_FERMETEUR}}"></td>
                    </tr> 
                    <tr>
                    <td>TEL_manger: </td>
                    <td><input type="text" class="form-control" name="tel_manger" value="{{$salon->MANAGER_TEL}}"></td>
                    </tr> 
                    <td>Salon_photo: </td>
                    <td><input type="file" class="form-control" name="image_salon" value="{{old('$salon->image_salon')}}"></td>
                    @if($salon->image_salon)<td><img class="card-img-top" src="{{ url('/images/salon/'. $salon->image_salon) }}" height="100px" width="100px"
                     alt="Card image cap">  </td>
                     @endif
                    </tr>  
                    <tr class="mr-auto">
                    <td colspan="2"><input type="submit" class="form-control btn-danger " value="Modifier"> <td>
                    </tr>
                    </tbody>
                    </table>
                      </div>
                      
                      </div>
                      </div>
                        
                            </div>
                        </div>
                    </div>
</section>  
  
            @endsection
 
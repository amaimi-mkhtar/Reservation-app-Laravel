
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
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-10">
                            <h2 class="jumbotron-heading text-center"> Edit coiffeur</h2>
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
                    <form method="POST" action="/administration/ModifierCoiffeur" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="text" name="id_coiffeur" value="{{$coiffeur->ID_COIFFEUR}}" hidden >
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td >Name:</td>
                    <td><input type="text" class="form-control" name="coiffeur_name" placeholder="name_coiffeur" value="{{$coiffeur->NOM_COIFFEUR}}"></td>
                    </tr> 
                    <tr>
                    <td >Salon:</td>
                    <td>
                    <select  class="form-control" name="name_salon"  value="{{old('name_salon')}}" >
                        <option>{{$coiffeur->NAME_SALON }}</option>
                        <?php  $salons = \App\salon::all()->pluck('NAME_SALON')?>
                        @foreach($salons as $salon_name)
                        <option>{{$salon_name}}</option>
                        @endforeach
                    </select>
                    </td>
                    </tr>
                    <tr>
                    <td >Tel:</td>
                    <td>
                    <input type="text" class="form-control" name="tel"  value="{{$coiffeur->TEL_COIFFEUR }}" ></td>
                    </tr>   
                    <tr>
                    <td>Coiffeur_photo: </td>
                    <td><input type="file" class="form-control" name="image_coiffeur" value="{{$coiffeur->coiffeur_image}}"></td>
                    @if($coiffeur->coiffeur_image)<td><img class="card-img-top" src="{{ url('/images/coiffeur/'. $coiffeur->coiffeur_image) }}" height="100px" width="100px"
                     alt="Card image cap">  </td>
                     @endif 
                    </tr>
                    
                    <tr class="mr-auto">
                    <td colspan="2"><input type="submit" class="form-control btn-danger" value="Modifier"> <td>
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
 
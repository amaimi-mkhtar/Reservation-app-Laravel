
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
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-10">
                            <h2 class="jumbotron-heading text-center"> ADD SALON</h2>
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
                    <form method="POST" action="/administration/AjouterSalon" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td >Name:</td>
                    <td><input type="text" class="form-control" name="salon_name" placeholder="name_salon" value="{{old('salon_name')}}"></td>
                    </tr> 
                    <tr>
                    <td >Adresse:</td>
                    <td><input type="text" class="form-control" name="adresse"  placeholder="adresse"value="{{old('adresse')}}" ></td>
                    </tr>
                    <tr>
                    <td >Description:</td>
                    <td>
                    <textarea type="text" class="form-control" name="description"
                     rows="3"   value="{{old('description')}}" ></textarea></td>
                    </tr>   
                    <tr>
                    <td>Temps_ouverteur:</td>
                    <td><input type="time"  class="form-control" name="temps_over" value="{{old('temps_over')}}"></td>
                    </tr>                  
                    <tr>
                    <td>Temps_fermeteur:</td>
                    <td><input type="time" class="form-control" name="temps_ferm" value="{{old('temps_ferm')}}"></td>
                    </tr> 
                    <tr>
                    <td>TEL_manger: </td>
                    <td><input type="text" class="form-control" name="tel_manger" placeholder="manager-tel" value="{{old('tel_manger')}}"></td>
                    </tr>
                    <td>Salon_photo: </td>
                    <td><input type="file" class="form-control" name="image_salon" value="{{old('image_salon')}}"></td>
                    </tr>  
                    <tr class="mr-auto">
                    <td colspan="2"><input type="submit" class="form-control btn-danger" value="Add Salon"> <td>
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
 
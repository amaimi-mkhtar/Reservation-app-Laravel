
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
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-10">
                            <h2 class="jumbotron-heading text-center"> ADD Prestation</h2>
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
                    <form method="POST" action="/administration/AjouterPrestation" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td >Name_Prestation:</td>
                    <td><input type="text" class="form-control" name="prestation_name" placeholder="prestation_name" value="{{old('prestation_name')}}"></td>
                    </tr> 
                    <tr>
                    <td >Coiffeur:</td>
                    <td>
                    <select  class="form-control" name="name_coiffeur"  value="{{old('name_coiffeur')}}" >
                        <?php  $coiffeurs = \App\coiffeur::all()->pluck('NOM_COIFFEUR')?>
                        @foreach($coiffeurs as $coiffeur_name)
                        <option>{{$coiffeur_name}}</option>
                        @endforeach
                    </select>
                    </td>
                    </tr>
                    <tr>
                    <td >Description:</td>
                    <td>
                    <textarea  class="form-control" name="description_prestation"  value="{{old('description_prestation')}}" rows="3" ></textarea >
                    </td>
                   
                    </tr>  
                    <tr>
                    <td >Prix:</td>
                    <td>
                    <input type="text" class="form-control" name="prix_prestation" placeholder="en $" value="{{old('prix_prestation')}}" ></td>
                    </tr> 
                    <tr>
                    <td >Duree:</td>
                    <td>
                    <input type="text" class="form-control" name="duree_prestation"  placeholder="en min " value="{{old('duree_prestation')}}" ></td>
                    </tr>  
                    
                    <tr>
                    <td >Sex:</td>
                    <td>
                    <div class="form-group">
                    <select  class="form-control" name="sex_prestation">
                    <option>Homme</option>
                    <option> Femme</option>
                    <option>H/F</option>
                    </select>
                    </div>
                    </td>
                    </tr>
                    
                    <tr>
                    <td>Prestation_photo: </td>
                    <td><input type="file" class="form-control" name="image_prestation" value="{{old('image_prestation')}}"></td>
                    </tr>  
                    <tr class="mr-auto">
                    <td colspan="2"><input type="submit" class="form-control btn-danger" value="Add Prestation"> <td>
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
 
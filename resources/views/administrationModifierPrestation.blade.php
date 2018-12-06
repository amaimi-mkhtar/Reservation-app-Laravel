
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
                            <h2 class="jumbotron-heading text-center"> Modifier Prestation</h2>
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
                    <form method="POST" action="/administration/ModifierPrestation" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="text" name="id_prestation" value="{{$prestation->id_prestation}}" hidden>
                    <table class="table table-striped table-hover  table-dark text-center">
                    <tbody>
                    <tr>
                    <td >Name_Prestation:</td>
                    <td><input type="text" class="form-control" name="prestation_name" value="{{$prestation->NOM_PRESTATION }}"></td>
                    </tr> 
                    <tr>
                    <td >Coiffeur:</td>
                    <td>
                    <select  class="form-control" name="name_coiffeur"  value="{{old('name_coiffeur')}}" >
                    <option>{{$prestation->NOM_COIFFEUR}}</option>
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
                    <textarea  class="form-control" name="description_prestation"   rows="3" >{{$prestation->description_prestation}}</textarea >
                    </td>
                   
                    </tr>  
                    <tr>
                    <td >Prix:</td>
                    <td>
                    <input type="text" class="form-control" name="prix_prestation"  value="{{$prestation->prix_prestation}}" ></td>
                    </tr> 
                    <tr>
                    <td >Duree:</td>
                    <td>
                    <input type="text" class="form-control" name="duree_prestation"  value="{{$prestation->duree}}" ></td>
                    </tr>  
                    
                    <tr>
                    <td >Sex:</td>
                    <td>
                    <div class="form-group">
                    <select  class="form-control" name="sex_prestation">

                    <option @if($prestation->Sex_prestation == 'H') selected @endif> Homme</option>
                    <option @if($prestation->Sex_prestation == 'F') selected @endif> Femme</option>
                    <option @if($prestation->Sex_prestation == 'F/H') selected @endif>H/F</option>
                    </select>
                    </div>
                    </td>
                    </tr>
                    
                    <tr>
                    <td>Prestation_photo: </td>
                    <td><input type="file" class="form-control" name="image_prestation" value="{{$prestation->prestation_image}}"></td>
                    @if($prestation->prestation_image )<td><img class="card-img-top" src="{{ url('/images/prestation/'.$prestation->prestation_image) }}" height="100px" width="100px"
                     alt="Card image cap">  </td>
                     @endif
                    </tr>  
                    <tr class="mr-auto">
                    <td colspan="2"><input type="submit" class="form-control btn-danger" value="Modifier Prestation"> <td>
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
 
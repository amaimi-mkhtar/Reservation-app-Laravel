
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
                    <td><a  href="/administration/salons/ajouter" class="lead text-muted" style="color:gray;">ajouter</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-4">
                            <form method="POST" action="/administration/salons/search" >
                            {{csrf_field()}}
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                        <div class="input-group-btn">
                              
                                        <button class="btn btn-default" type="submit" >
                                        <span class="glyphicon glyphicon-search"></span> search
                                        </button>
                                        </div>
                                </div>
                                </form>
                            </div>
                            <div class="col-4">
                            @if ($error = $errors->first('salon_modifier'))
                                <div class="alert alert-success text-center" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $error }}
                                </div>
                             @endif
                             
                             </div>
                
            </div>
            
                            <hr>
           

          

                <div class="row">
                @foreach($salons as $salon)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    @if($salon->image_salon === "")
                    <img class="card-img-top" src="{{ url('/images/salon/salon.jpg') }}" height="250px" 
                     alt="Card image cap">   
                    @else
                    <img class="card-img-top" src="{{ url('/images/salon/'. $salon->image_salon) }}"  height="250px" alt="Card image cap">
                    
                    @endif
                    <div class="card-body">
                        <h4 class="card-text text-dark text-center" >{{ $salon->NAME_SALON}}</h4>
                        <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $salon->TEMPS_OUVERTEUR}} - {{ $salon->TEMPS_FERMETEUR}} </small>
                        <div class="btn-group">
                            <a  class="btn btn-sm btn-outline-secondary" href="/administration/salons/view/{{ $salon->ID_SALON}}">View</a>
                            <a  class="btn btn-sm btn-outline-secondary" href="/administration/salons/Modifier/{{ $salon->ID_SALON}}">Modifier</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                </div>
                        
                            </div>
                        </div>
                    </div>
</section>  
  
            @endsection

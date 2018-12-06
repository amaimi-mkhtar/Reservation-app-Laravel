
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
                    <td > <h2 class="jumbotron-heading">Reservations</h2></td>
                    </tr>
                    <tr style="padding:0px;border:0px;" colspan="2">
                           
                    </tr>
                    <tr style="padding:0px;border:0px;">
                    <td><a  href="/administration/reservations/ajouter" class="lead text-muted" style="color:gray;">ajouter</a></td>
                    </tr>
                   
                </tbody>
            </table>
            </div>
            <div class="col-sm-10 text-left"> 
            <hr>
            <div class="row">

                            <div class="col-4">
                            <form method="POST" action="/administration/reservations/search" >
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
                            @if ($error = $errors->first('reservation_done'))
                                <div class="alert alert-success text-center" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $error }}
                                </div>
                             @endif
                            @if ($error = $errors->first('reservation_confirmer'))
                                <div class="alert alert-success text-center" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $error }}
                                </div>
                             @endif
                             @if ($error = $errors->first('reservation_annuler'))
                                <div class="alert alert-danger text-center" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $error }}
                                </div>
                             @endif
                             </div>
                
            </div>
            
                            <hr>
            <div class="table-responsive"> 
 <table class="table table-striped table-hover  table-dark text-center">
    <thead>
      <tr>
        <th>ID_reservation</th>
        <th>Email</th>
        <th>prestation</th> 
        <th>Salon</th> 
        <th>coiffeur</th>        
        <th>Heure</th>
        <th>date</th>
        <th>Statu</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>

        @foreach($reservations as $reservation)

        <?php
      
        $prestation = \App\pristation::where('id_prestation','=',$reservation->id_prestation)->first();
        $coiffeur = \App\coiffeur::where('NOM_COIFFEUR','=',$prestation->NOM_COIFFEUR)->first();
        $salon= \App\salon::where('NAME_SALON','=',$coiffeur->NAME_SALON)->first();
        ?>
       
        <tr>
        
            <td>{{$reservation->ID_RESERVATION}}</td>
            <td>{{$reservation->EMAIL}}</td>
            <td>{{$prestation->NOM_PRESTATION}}</td>
            <td>{{$salon->NAME_SALON}}</td>
            <td>{{$coiffeur->NOM_COIFFEUR}}</td>
            <td>{{$reservation->HEURE }}</td>
            <td>{{$reservation->DATE }}</td>
            @switch($reservation->statu)
            @case('en attent')<td class="text-warning">{{$reservation->statu}}</td>@break
            @case('confirmer')<td class="text-success">{{$reservation->statu}}</td>@break
            @case('annuler')<td class="text-danger">{{$reservation->statu}}</td>@break
            @case('expire')<td class="text-info">{{$reservation->statu}}</td>@break
            @endswitch
            <td >
            @if($reservation->statu != 'confirmer')<a class="btn btn-outline-success btn-sm" href="/administration/reservations/confirmer/{{$reservation->ID_RESERVATION}}">confirmer</a><hr>@endif
            @if($reservation->statu != 'annuler')<a class="btn btn-outline-danger btn-sm" href="/administration/reservations/annuler/{{$reservation->ID_RESERVATION}}">Annuler</a><hr>@endif
            </td>
            
        </tr>
       
      @endforeach
    </tbody>
  </table>
  </div>
           
            </div>
        </div>
    </div>
</section>  
  
            @endsection

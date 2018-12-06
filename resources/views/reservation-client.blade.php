
@extends('layouts.master')



@section('content')

<section class="jumbotron text-center">
<div class="album py-5 bg-light">

    <div class="container">
    <h1 class="jumbotron-heading text-center">Reservations</h1>
        @if ($error = $errors->first('reservation_done'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ $error }}
                        </div>
        @endif


<div class="table-responsive"> 
 <table class="table table-striped table-hover  table-dark">
 <thead>


 <th style="padding:0px;border:0px;" colspan="2"><a type="button" href="./Confirmer" class=" btn-success btn-block ">Confirmer</a></th>
 <th style="padding:0px;border:0px;"><a type="button" href="./Annuler" class="btn-danger btn-block">Annuler</a></th>
 <th style="padding:0px;border:0px;"><a type="button" href="./en attent" class="btn-warning btn-block">en attent</a></th>
 <th style="padding:0px;border:0px;"><a type="button" href="./expiré" class="btn-info btn-block">expiré</a></th>
  
 
  
 
  </thead>
    <thead>
      <tr>
        <th>N°</th>
        <th>Heure</th>
        <th>date</th>
        <th>Statu</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>

        @foreach($reservations as $reservation)
       
        <tr>
        
            <td>{{$i}}</td>
            <td>{{$reservation->HEURE }}</td>
            <td>{{$reservation->DATE }}</td>
            @switch($reservation->statu)
            @case('en attent')<td class="text-warning">{{$reservation->statu}}</td>@break
            @case('confirmer')<td class="text-success">{{$reservation->statu}}</td>@break
            @case('annuler')<td class="text-danger">{{$reservation->statu}}</td>@break
            @case('expire')<td class="text-info">{{$reservation->statu}}</td>@break
            @endswitch
            <td><a href="../{{$reservation->ID_RESERVATION}}" >More</a></td>
            
        </tr>
       <?php $i++;?>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>
  </div>
  
</section>


@endsection

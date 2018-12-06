
@extends('layouts.adminmaster')



@section('content')
<?php 
$day=new  Carbon\Carbon($date->format('20y-m-d'));

                     ?>
<section class="jumbotron bg-light ">
<div class="row ml-auto">
<div class="col-md-1">
          <div class="col-sm-12 text-center ">
          <table class="table table-dark" >
                <tbody  >
                <tr style="padding:0px;border:0px;"  colspan="3"  ><td><a href="http://rv.me/administration/{{$day->subDay()->format('20y-m-d')}}")><p class="lead text-muted" ><<</p></a></td></tr>

                </tbody>
            </table>
            </div>
 
</div>
<?php $day->addDay();?>
<div class="col-md-10">
          <div class="col-sm-12 text-center ">
          <table class="table table-dark" >
                <tbody  >
                <tr style="padding:0px;border:0px;"  colspan="3"  ><td><p class="lead text-muted" >Day {{$date->format('20y-m-d')}}</p></td></tr>

                </tbody>
            </table>
            </div>
 
</div>
<div class="col-md-1">
          <div class="col-sm-12 text-center ">
          <table class="table table-dark" >
                <tbody  >
                <tr style="padding:0px;border:0px;"  colspan="3"  ><td><a href="http://rv.me/administration/{{$day->addDay()->format('20y-m-d')}}")><p class="lead text-muted" >>></p></a></td></tr>

                </tbody>
            </table>
            </div>
 
</div>

</div>
<div class="row">

<div class="col-md-12">
        <div class="row-fluid" >
        
        @foreach($coiffeurs as $coiffeur)
        <?php
                   
                    $prestations =\App\pristation::where('NOM_COIFFEUR','=',$coiffeur->NOM_COIFFEUR)->pluck('id_prestation');
           
                    $reservations=\App\reservation::whereIn('id_prestation',$prestations)
                                                    ->where('DATE','=',$date->format('20y-m-d'))
                                                    ->orderBy('HEURE')
                                                    ->get();
                     

                    ?>
          <div class="col-sm-2 text-center " style="margin:0px;"> 
          <table class="table table-dark " id="table"> 
                <tbody  >
                  <tr style="padding:0px;border:0px;" colspan="2" >
                    <td><img class="card-img-top" src="{{ url('/images/coiffeur/'.$coiffeur->coiffeur_image) }}" height="160px" 
                     alt="Card image cap"></td>
                    </tr>
                    <tr style="padding:0px;border:0px;" >
                    <td > <p class="jumbotron-heading">{{$coiffeur->NOM_COIFFEUR}}</p></td>
                    </tr>
                   
                    @if(count($reservations))
                    @foreach($reservations as $reservation)
                    <?php
                        $prestation = \App\pristation::where('id_prestation','=',$reservation->id_prestation)->first();
                        $coiffeur = \App\coiffeur::where('NOM_COIFFEUR','=',$prestation->NOM_COIFFEUR)->first();
                        $salon= \App\salon::where('NAME_SALON','=',$coiffeur->NAME_SALON)->first();
                        $client= \App\client::where('email','=',$reservation->EMAIL)->first();
                        ?>
                        
                        <tr ><td>
                        <div class="alert alert-success text-left">
                        <p class="text-center" ><span class="badge ">{{$reservation->HEURE }}</span><br></p>
                        <p  ><span class="badge">Client:</span>{{$client->name}} {{$client->PRENOM }}<br>
                        <span class="badge">Prestation:</span>{{$prestation->NOM_PRESTATION}}</p>
                        </div>
                        </td></tr>
                    
                    
                    @endforeach
                    @else
                    <tr ><td>
                        <div class="alert alert-warning">
                        <strong class="text-danger" >No reservation Yet</strong>
                        
                        </div>
                        </td></tr>
                    
                    @endif
                </tbody>
            </table>
          </div>
         
@endforeach
         
</div>
           
          
</div>          
       
</section> 
<style>

        
           #me{
          
            overflow-x: scroll;
           }
           .row-fluid{
           
            overflow: auto;
            white-space: nowrap;
            float: none;
      }
          .row-fluid .col-sm-2{
            display:inline-table;
            float: none;
           
            
          }

          
         </style>  
  
            @endsection

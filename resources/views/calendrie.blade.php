<div class=" py-5 bg-light">

        <div class="row-fluid" >
        
@for($i=0;$i<20;$i++)
          <div class="col-md-3">
          <div class="card mb-3 box-shadow">
          <div class="card-body text-center">
          
          <p class="lead text-muted  ">{{$dt->addDay()}}</p>
          <div id="me">

          <?php 
           $prestation = \App\pristation::where('id_prestation','=',$prestation->id_prestation)->get()->first();
           $coiffeur  = \App\coiffeur::where('NOM_COIFFEUR','=',$prestation->NOM_COIFFEUR)->get()->first();
           $prestations =\App\pristation::where('NOM_COIFFEUR','=',$coiffeur->NOM_COIFFEUR)->pluck('id_prestation');
           $Taken_reservationTime =  [];
           foreach($prestations as $PrestationId) {
                $temps_reserver= \App\reservation::where([
                ['DATE','=',$dt->Format('Y-m-d')],
                ['id_prestation','=',$PrestationId]
                ])->pluck('HEURE')->toArray();
                $Taken_reservationTime  =array_merge($temps_reserver,$Taken_reservationTime );
            }

                ?>

          @while( ! $temps_over->addMinutes(0)->gte($temps_ferm))

               
                @if(in_array($temps_over->format('H:i:s'),$Taken_reservationTime))
                <?php $temps_over->addMinutes($prestation->duree)->format('H:i'); ?>
                @continue
                @endif
               

                <a href=" ./{{$prestation->id_prestation}}/{{$dt->Format('Y-m-d')}}/{{  $temps_over->addMinutes(0)->format('H:i')}}"> 
                <p class="lead text-muted ">
                De {{  $temps_over->addMinutes(0)->format('H:i')}} à {{$temps_over->addMinutes($prestation->duree)->format('H:i')}}
                </p></a>
                  
          @endwhile
          <?php $temps_over->setTimeFromTimeString($salon->TEMPS_OUVERTEUR) ;?>
          </div>
          </div>
          </div>
          </div>
@endfor
          </div>
         <style>
           #me{
            height: 200px;
            overflow-y: scroll;
           }
           .row-fluid{
            overflow: auto;
            white-space: nowrap;
            float: none;
      }
          .row-fluid .col-md-3{
            display:inline-block;
            float: none;
          }
         </style> 
    
          
          </div>
          </div>

<?php

namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\reservation;

class ReservationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
       
        
        }

//creatreservation

    public function creatreservation($NAME_SALON,$NAME_COIFFEUR,$ID_PRESTATION){
        $prestation = \App\pristation::where('id_prestation','=',$ID_PRESTATION)->get()->first();
        if(!$prestation ){return redirect('/');}
        $coiffeur  = \App\coiffeur::where('NOM_COIFFEUR','=',$NAME_COIFFEUR)->get()->first();
        $salon = \App\salon::where('NAME_SALON','=',$NAME_SALON)->get()->first();

        $dt =  Carbon::yesterday();
        Carbon::setToStringFormat('l Y/m/d ');
        $temps_over=new Carbon;
        $temps_ferm=new Carbon;
        $temps_over->setTimeFromTimeString($salon->TEMPS_OUVERTEUR);
        $temps_ferm->setTimeFromTimeString($salon->TEMPS_FERMETEUR);
        
        
        return view('reservation',compact('prestation','coiffeur','salon','dt','temps_over','temps_ferm'));

        }

//addreservation

        public function addreservation($NAME_SALON,$NAME_COIFFEUR,$ID_PRESTATION,$reservation_date,$reservation_time){
            $prestation = \App\pristation::where('id_prestation','=',$ID_PRESTATION)->get()->first();
            if(!$prestation ){return redirect('/');}
            $coiffeur  = \App\coiffeur::where('NOM_COIFFEUR','=',$prestation->NOM_COIFFEUR)->get()->first();
            $salon = \App\salon::where('NAME_SALON','=',$coiffeur->NAME_SALON)->get()->first();
                
            $prestations =\App\pristation::where('NOM_COIFFEUR','=',$coiffeur->NOM_COIFFEUR)->pluck('id_prestation');
            $resultTaken = [];
            foreach($prestations as $prestation){
                $taken = \App\reservation::where([
                ['DATE','=',$reservation_date],
                ['HEURE','=',$reservation_time],
                ['id_prestation','=',$prestation],
                
                ])->first();
                if($taken != null) { array_push($resultTaken,$taken);}
                }
                if(count($resultTaken)){
                $errors = new MessageBag(['date_taken' => ['Sorry this appointments already Taken ']]);
                    return redirect()->back()->withErrors($errors);
                }

                $reservation = new \App\reservation;
                $reservation->EMAIL = \Auth::user()->email;
                $reservation->DATE = $reservation_date;
                $reservation->HEURE =$reservation_time;
                $reservation->id_prestation = $ID_PRESTATION;
                $reservation->save();
                $errors = new MessageBag(['reservation_done' => ['your reservation done wait for  the confirmation']]);
                return redirect('/client/reservations/confirmer')->withErrors($errors);

        }




//show toutes les reservations d'un client
        public function Showreservations($statu){
            $reservations = \App\reservation::where([
                ['EMAIL','=',\Auth::user()->email],
                ['statu','=',$statu],
            ])->orderBy('ID_RESERVATION', 'desc')->get();
            $i=1;
            return view('reservation-client',compact('reservations','i'));

        }
//show toutes les informations d'une seul  reservation d'un client
        public function inforeservations($id_reservations){
            $reservation = \App\reservation::where('ID_RESERVATION','=',$id_reservations)->get()->first();
            if(!$reservation){return redirect('/');}
            $prestation = \App\pristation::where('id_prestation','=',$reservation->id_prestation)->get()->first();
            $coiffeur  = \App\coiffeur::where('NOM_COIFFEUR','=',$prestation->NOM_COIFFEUR)->get()->first();
            $salon = \App\salon::where('NAME_SALON','=',$coiffeur->NAME_SALON)->get()->first();
    
            return view('Inforeservation',compact('prestation','coiffeur','salon','reservation'));
    
            }

//annuler reservation 
public function annuler_reservation($ID_RESERVATION){
    $reservation = reservation::where('ID_RESERVATION','=',$ID_RESERVATION)->first();
    $reservation->statu = 'annuler';
    $reservation->save();

    return redirect('/client/reservations/annuler');

}


//admin functions

public function adminconsulterResrvations(){
    $dt =  Carbon::now();
   
    $reservations = reservation::where('DATE','=',$dt->format('y-m-d'))->orderBy('ID_RESERVATION', 'desc')->get();
   
    return view('administration',compact('reservations'));

}


public function adminsearchResrvations(){

   
    $salon= \App\salon::where('NAME_SALON','LIKE','%'.request('search').'%')->first();
    

        if($salon){
            $coiffeur= \App\coiffeur::where('NAME_SALON','LIKE',$salon->NAME_SALON)->pluck('NOM_COIFFEUR');
            }
         else{
             
             $coiffeur= \App\coiffeur::where('NOM_COIFFEUR','LIKE','%'.request('search').'%')->pluck('NOM_COIFFEUR');
            
             
            }                  
                         
            if($coiffeur){
            $prestations = \App\pristation::whereIn('NOM_COIFFEUR',$coiffeur)
                        ->pluck('id_prestation');
                        
                    }

            if(count($coiffeur)==0){
                        
            $prestations = \App\pristation::where('NOM_PRESTATION','LIKE','%'.request('search').'%')->pluck('id_prestation');
                
                        
                    }
                   
        if(!$prestations){
            $prestations = [];
        }
 
                  
                    
    $reservations = reservation::whereIn('id_prestation',$prestations)
                    ->orWhere('ID_RESERVATION','LIKE','%'.request('search').'%')
                    ->orWhere('HEURE','LIKE','%'.request('search').'%')
                    ->orWhere('DATE','LIKE','%'.request('search').'%')
                    ->orWhere('EMAIL','LIKE','%'.request('search').'%')
                    ->orWhere('statu','LIKE','%'.request('search').'%')
                    ->get();
                   
    return view('administration',compact('reservations'));
    
}


    public function adminConfAnnulResrvation($operation,$id_reservation){
        $reservation = reservation::where('ID_RESERVATION','=',$id_reservation)->first();

        if($operation=='confirmer'){
        $reservation->statu = 'confirmer';
        $reservation->save();
        $errors = new MessageBag(['reservation_confirmer' => ['la  reservation '.$id_reservation.' est confirmer']]);
        }
        if($operation=='annuler'){
            $reservation->statu = 'annuler';
            $reservation->save();
            $errors = new MessageBag(['reservation_annuler' => ['la  reservation '.$id_reservation.' est annuler']]);
            }
        return redirect('/administration/reservations')->withErrors($errors);
        
    }

  public function adminConsultstatistiques(){
        $mois =  Carbon::now();
        $reservations = \App\reservation::where('DATE','LIKE','%'.$mois->format('y-m').'%')->pluck('id_prestation');
       return view('administartionStatistiques');
        
  } 
   

  public function AjaxfetchDatatoAddRes(){
  
 
    if(request('salon_name')!==null){
        $coiffeurs = \App\coiffeur::where('NAME_SALON','=',request('salon_name'))->pluck("NOM_COIFFEUR");
        if(count($coiffeurs)){
        echo "<option>select coiffeur</option>" ;
        foreach($coiffeurs as $coiffeur){
            echo "<option>".$coiffeur."</option>";
        }
        }else{echo "<option>NO coiffeur </option>" ;}
    }
    
    
    elseif(request('coiffeur_name')!==null){
        $prestations = \App\pristation::where('NOM_COIFFEUR','=',request('coiffeur_name'))->get();
        if(count($prestations)){
        echo "<option>select prestation</option>" ;
        foreach($prestations as $prestation){
            echo "<option value=".$prestation->id_prestation.">".$prestation->NOM_PRESTATION." : ".$prestation->prix_prestation ."$ : ".$prestation->duree ."min </option>";
        }

        }else{echo "<option>NO prestation </option>" ;}

    
    }
    

  }

  public function AdminAddReservation(){
    $this->validate(request(),[
        'email_client'=> 'required|regex:/[0-9A-Za-z]*(@)[0-9A-Za-z]*\.[A-Za-z]{2,4}$/|exists:client,email',
        'salon_name'=> 'required|exists:salon,NAME_SALON',
        'coiffeur_name'=> 'required|exists:coiffeur,NOM_COIFFEUR',
        'prestation_id'=> 'required|numeric',
        'date_reservation'=>'required|date',
        'time_reservation'=>'required',
        
    ]);
    
        $prestation = \App\pristation::where('id_prestation','=',request('prestation_id'))->get()->first();
        $coiffeur  = \App\coiffeur::where('NOM_COIFFEUR','=',$prestation->NOM_COIFFEUR)->get()->first();
        $prestations =\App\pristation::where('NOM_COIFFEUR','=',$coiffeur->NOM_COIFFEUR)->pluck('id_prestation');
        
        $resultTaken =[];
        foreach($prestations as $prestation){
            $taken = \App\reservation::where([
                ['DATE','=',request('date_reservation')],
                ['HEURE','=',request('time_reservation')],
                ['id_prestation','=',$prestation],
                
            ])->first();
            if($taken != null) { array_push($resultTaken,$taken);}
         
            }
              
       
        if(count($resultTaken)){
        $errors = new MessageBag(['date_taken' => ['Sorry this appointments already Taken ']]);
            return redirect()->back()->withErrors($errors);
        }

        $reservation = new \App\reservation;
        $reservation->EMAIL = request('email_client');
        $reservation->DATE = request('date_reservation');
        $reservation->HEURE =request('time_reservation');
        $reservation->id_prestation = request('prestation_id');
        $reservation->save();
        $errors = new MessageBag(['reservation_done' => ['the reservation for '.request('email_client').' is  done ']]);
        return redirect('/administration/reservations')->withErrors($errors);

  }


  
}



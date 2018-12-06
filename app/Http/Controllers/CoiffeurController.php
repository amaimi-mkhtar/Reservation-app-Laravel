<?php

namespace App\Http\Controllers;
use \App\coiffeur;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;

class CoiffeurController extends Controller
{
    public function showcoiffeurs($NAME_SALON){
        $coiffeurs =\App\coiffeur::where('NAME_SALON','=',$NAME_SALON)->get();
        $salon=\App\salon::where('NAME_SALON','=',$NAME_SALON)->first();
        //dd($salons);
        if($salon){
        return view('salons',compact('coiffeurs','salon'));
        }else{
            $salons =  \App\salon::all();
         return view('welcome',compact('salons'));
        }

    }


    //admin consulter coiffeurs


    public function adminconsultercoiffeurs(){
        $coiffeurs = \App\coiffeur::all();
        return view('administrationCoiffeurs',compact('coiffeurs'));
    }

    public function adminAjoutCoiffeur(){
        $this->validate(request(),[
            'coiffeur_name'=>'required|max:40|min:3|unique:coiffeur,NOM_COIFFEUR',
            'name_salon'=>'required|exists:salon,NAME_SALON',
            'tel'=> 'required|numeric',
            'image_coiffeur' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            
        ]);
        
         $imgname = time().'.'.request('image_coiffeur')->getClientOriginalExtension();
            request('image_coiffeur')->move(public_path('images/coiffeur'), $imgname);
         
        
         $coiffeur = new \App\coiffeur;
        $coiffeur->NOM_COIFFEUR = request('coiffeur_name');
        $coiffeur->NAME_SALON = request('name_salon');
        $coiffeur->TEL_COIFFEUR = request('tel');
        $coiffeur->coiffeur_image = $imgname ;
        $coiffeur->save();
        $coiffeurs = \App\coiffeur::all();
        return view('administrationCoiffeurs',compact('coiffeurs'));
                
    }
    

    public function adminviewcoiffeur($id_coiffeur){
        $coiffeur = \App\coiffeur::where('ID_COIFFEUR','=',$id_coiffeur)->first();
        $prestations=\App\pristation::where('NOM_COIFFEUR','=',$coiffeur->NOM_COIFFEUR)->pluck('NOM_PRESTATION');

        return view('administrationViewCoiffeur',compact('coiffeur','prestations'));
    }

    public function adminmodifiercoiffeur($id_coiffeur){
        $coiffeur = \App\coiffeur::where('ID_COIFFEUR','=',$id_coiffeur)->first();
        return view('administrationModifierCoiffeur',compact('coiffeur'));

    }

    public function modifiercoiffeur(){
        $this->validate(request(),[
            'coiffeur_name'=>'required|max:40|min:3',
            'name_salon'=>'required|exists:salon,NAME_SALON',
            'tel'=> 'required|numeric',
            'image_coiffeur' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            
        ]);
        $coiffeur = \App\coiffeur::where('ID_COIFFEUR','=',request('id_coiffeur'))->first();
        if(request('image_coiffeur')==null){
            $imgname = $coiffeur->coiffeur_image;
        }
        else{
            $imgname = time().'.'.request('image_coiffeur')->getClientOriginalExtension();
            request('image_coiffeur')->move(public_path('images/coiffeur'), $imgname);
         }
        
        
        
        $errors = new MessageBag(['coiffeur_modifier' => ['le coiffreur '.$coiffeur->NOM_COIFFEUR.' est Modifier']]);
        $coiffeur->NOM_COIFFEUR = request('coiffeur_name');
        $coiffeur->NAME_SALON = request('name_salon');
        $coiffeur->TEL_COIFFEUR = request('tel');
        $coiffeur->coiffeur_image = $imgname ;
        $coiffeur->save();
        $coiffeurs = \App\coiffeur::all();
       
        return view('administrationCoiffeurs',compact('coiffeurs'))->withErrors($errors);
    }

    public function adminsearchcoiffeur(){

        $coiffeurs= \App\coiffeur::where('NOM_COIFFEUR','LIKE','%'.request('search').'%')
        ->orWhere('NAME_SALON','LIKE','%'.request('search').'%')->get();

        return view('administrationCoiffeurs',compact('coiffeurs'));

    }



    public function adminconsulterResrvations(){
        $coiffeurs = \App\coiffeur::all();
        Carbon::setToStringFormat('l Y/m/d '); 
        $date=Carbon::now();
    
                return view('adminHome',compact('coiffeurs','date'));
       
      
    }
    public function adminconsulterResrvationsByDAY($day){
        $coiffeurs = \App\coiffeur::all();
        Carbon::setToStringFormat('l Y/m/d '); 
        $date= new Carbon($day);
    
                return view('adminHome',compact('coiffeurs','date'));
       
      
    }


}

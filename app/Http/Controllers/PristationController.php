<?php

namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;

class PristationController extends Controller
{
    public function showprestations($NAME_SALON,$NAME_COIFFEUR){
        $prestations = \App\pristation::where('NOM_COIFFEUR','=',$NAME_COIFFEUR)->get();
        $coiffeur = \App\coiffeur::where('NOM_COIFFEUR','=',$NAME_COIFFEUR)->first();
        $salon = \App\salon::where('NAME_SALON','=',$NAME_SALON)->first();
        //dd($coiffeurs);
        return view('coiffeur',compact('prestations','coiffeur','salon'));

    }

    public function adminconsultprestations(){
        $prestations = \App\pristation::all();
        return view('administrationPrestations',compact('prestations'));
    }
    public function adminAjoutPrestation(){
        $this->validate(request(),[
            'prestation_name'=>'required|max:40|min:3|unique:pristation,NOM_PRESTATION',
            'name_coiffeur'=>'required|exists:coiffeur,NOM_COIFFEUR',
            'description_prestation'=> 'required',
            'prix_prestation'=>'required|numeric',
            'duree_prestation'=>'required|numeric|max:60',
            'sex_prestation'=>'required',
            'image_prestation' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            
        ]);
        
        switch(request('sex_prestation')){
            case'Homme': $sexe ='H'; break;
            case'Femme': $sexe ='F'; break;
            case'F/H': $sexe ='F/H'; break;
            
        }
        
         $imgname = time().'.'.request('image_prestation')->getClientOriginalExtension();
            request('image_prestation')->move(public_path('images/prestation'), $imgname);
         
        
         $prestation = new \App\pristation;
         $prestation->NOM_PRESTATION = request('prestation_name');
         $prestation->NOM_COIFFEUR = request('name_coiffeur');
         $prestation->description_prestation = request('description_prestation');
         $prestation->duree = request('duree_prestation');
         $prestation->prix_prestation  = request('prix_prestation');
         $prestation->Sex_prestation =  $sexe;
         $prestation->prestation_image  =  $imgname;
         $prestation->save();
        
         $prestations = \App\pristation::all();
        return view('administrationPrestations',compact('prestations'));
                
    }

    public function adminviewprestation($id_prestation){
        $prestation=\App\pristation::where('id_prestation','=',$id_prestation)->first();

        return view('administrationViewPrestation',compact('prestation'));
    }


    public function adminModifierprestation($id_prestation){
        $prestation = \App\pristation::where('id_prestation','=',$id_prestation)->first();
        return view('administrationModifierPrestation',compact('prestation'));
    }



    public function modifierPrestation(){
        $this->validate(request(),[
            'prestation_name'=>'required|max:40|min:3',
            'name_coiffeur'=>'required|exists:coiffeur,NOM_COIFFEUR',
            'description_prestation'=> 'required',
            'prix_prestation'=>'required|numeric',
            'duree_prestation'=>'required|numeric|max:60',
            'sex_prestation'=>'required',
            'image_prestation' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            
        ]);
        $prestation = \App\pristation::where('id_prestation','=',request('id_prestation'))->first();
        if(request('image_prestation')==null){
            $imgname = $prestation->prestation_image ;
        }
        else{
            $imgname = time().'.'.request('image_prestation')->getClientOriginalExtension();
            request('image_prestation')->move(public_path('images/prestation'), $imgname);
         }
         switch(request('sex_prestation')){
            case'Homme': $sexe ='H'; break;
            case'Femme': $sexe ='F'; break;
            case'H/F': $sexe ='F/H'; break;
            
        }
        
        
        $errors = new MessageBag(['Prestation_modifier' => ['la prestation '.$prestation->NOM_PRESTATION .' est Modifier']]);
       
         $prestation->NOM_PRESTATION = request('prestation_name');
         $prestation->NOM_COIFFEUR = request('name_coiffeur');
         $prestation->description_prestation = request('description_prestation');
         $prestation->duree = request('duree_prestation');
         $prestation->prix_prestation  = request('prix_prestation');
         $prestation->Sex_prestation =  $sexe;
         $prestation->prestation_image  =  $imgname;
         $prestation->save();
         $prestations = \App\pristation::all();
        return view('administrationPrestations',compact('prestations'))->withErrors($errors);
    }
    public function adminsearchprestation(){
        $prestations= \App\pristation::where('NOM_PRESTATION','LIKE','%'.request('search').'%')
        ->orWhere('NOM_COIFFEUR','LIKE','%'.request('search').'%')
        ->orWhere('description_prestation','LIKE','%'.request('search').'%')
        ->orWhere('duree','LIKE','%'.request('search').'%')
        ->orWhere('Sex_prestation','LIKE','%'.request('search').'%')->get();
        return view('administrationPrestations',compact('prestations'));
    } 
}




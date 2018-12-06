<?php

namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;

class SalonController extends Controller
{
        public function showsalons(){
            $salons =  \App\salon::all();

         return view('welcome',compact('salons'));
        }



//ADMINISTRATION Functions
public function adminconsultersalons(){
        $salons = \App\salon::all();
        return view('administrationSalons',compact('salons'));
}

public function adminviewsalon($id_salon){
        $salon = \App\salon::where('ID_SALON','=',$id_salon)->first();
        $coiffeurs = \App\coiffeur::where('NAME_SALON','=',$salon->NAME_SALON)->get();
        return view('administrationViewSalon',compact('salon','coiffeurs'));


}
public function adminmodifiersalon($id_salon){
        $salon = \App\salon::where('ID_SALON','=',$id_salon)->first();
        return view('administrationModifierSalon',compact('salon'));
        

} 


public function modifiersalon(){
        $this->validate(request(),[
                'id_salon'=>'required|numeric',
                'salon_name'=>'required|max:40|min:3',
                'adresse'=>'required',
                'temps_over'=>'required',
                'temps_ferm'=>'required',
                'tel_manger'=>'required|numeric',
                'image_salon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                
            ]);
            

            $salon = \App\salon::where('ID_SALON','=',request('id_salon'))->first();
            if(request('image_salon') == null){
                    
                $imgname=$salon->image_salon;
                
                    }else{
                      
                        $imgname = time().'.'.request('image_salon')->getClientOriginalExtension();
                        request('image_salon')->move(public_path('images/salon'), $imgname);
                    }
            $errors = new MessageBag(['salon_modifier' => ['le salon '.$salon->NAME_SALON.' est Modifier']]);
            $salon->NAME_SALON = request('salon_name');
            $salon->ADRESSE = request('adresse');
            $salon->TEMPS_OUVERTEUR = request('temps_over');
            $salon->TEMPS_FERMETEUR = request('temps_ferm');
            $salon->MANAGER_TEL  = request('tel_manger');
            $salon->image_salon  = $imgname;
            $salon->save();
            ;

             $salons = \App\salon::all();
             return view('administrationSalons',compact('salons'))->withErrors($errors);;
           
}

public function adminAjoutSalon(){
        $this->validate(request(),[

                'salon_name'=>'required|max:40|min:3|unique:salon,NAME_SALON',
                'adresse'=>'required',
                'description'=> 'required',
                'temps_over'=>'required',
                'temps_ferm'=>'required',
                'tel_manger'=>'required|numeric',
                'image_salon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                
            ]);

                $imgname = request('salon_name').'.'.request('image_salon')->getClientOriginalExtension();
                request('image_salon')->move(public_path('images/salon'), $imgname);
                



        $salon = new \App\salon ;
        $salon->NAME_SALON = request('salon_name');
        $salon->ADRESSE = request('adresse');
        $salon->Description_salon = request('description');
        $salon->TEMPS_OUVERTEUR = request('temps_over');
        $salon->TEMPS_FERMETEUR = request('temps_ferm');
        $salon->MANAGER_TEL  = request('tel_manger');
        $salon->image_salon  = $imgname;
        $salon->save();


        $salons = \App\salon::all();
        return view('administrationSalons',compact('salons'));;

}

public function Adminsearchsalon(){
        $salons= \App\salon::where('NAME_SALON','LIKE','%'.request('search').'%')
        ->orWhere('TEMPS_OUVERTEUR','LIKE','%'.request('search').'%')
        ->orWhere('TEMPS_FERMETEUR','LIKE','%'.request('search').'%')
        ->orWhere('ADRESSE','LIKE','%'.request('search').'%')
        ->orWhere('Description_salon','LIKE','%'.request('search').'%')->get();
        return view('administrationSalons',compact('salons'));
        
}




}

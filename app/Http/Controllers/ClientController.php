<?php

namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Mail\confirmationcode;
use Hash;

use App\client;



class ClientController extends Controller
{   




     //SINGUP TRAITMENT
    public function singup(){
        //dd($_POST);
        $errors = new MessageBag;
        $this->validate(request(),[
            'First-Name'=> 'required|alpha|max:20|min:3',
            'Last-Name'=> 'required|alpha|max:20|min:3',
            'phone'=> 'required|regex:/(0[67])[0-9]{8}$/',
            'email'=> 'required|regex:/[0-9A-Za-z]*(@)[0-9A-Za-z]*\.[A-Za-z]{2,4}$/|unique:client,EMAIL',
            'password'=>'required|alpha-num|min:8|confirmed'
            
        ]);
        
        $confirmation_code = str_random(30);
        $client = new client;
        $client->name = request('First-Name');
        $client->PRENOM = request('Last-Name');
        $client->TEL = request('phone');
        $client->email = request('email');
        $client->password = bcrypt(request('password')) ;
        $client->confirmation_code  =$confirmation_code;
        $client->save();
       try{
        \Mail::to($client)->send(new confirmationCode($confirmation_code));

       }catch (\Exception $e){
        report($e);
        $errors = new MessageBag(['connection_faild' => ['some thing is wrong verify your connection ']]);
       
        return(redirect()->back()->withInput(request()->all())->withErrors($errors));
       }
       
        $errors = new MessageBag(['singup' => ['an Email have been sent to your email Check it to verify your acount  ']]);
        return(redirect('/')->withErrors($errors));
        }
            
        

    


   

    //LOGIN TRAITMENT
    public function login(Request $request){
        $errors = new MessageBag;
            $this->validate(request(),[

                'email'=>'required|regex:/[0-9A-Za-z]*(@)[0-9A-Za-z]*\.[A-Za-z]{2,4}$/|email|exists:client',
                'password'=>'required|alpha-num|min:8'
                
            ]);
        
        $remember=true;
            
        if ( Auth::attempt(array('email'=>request('email'),'password'=>request('password'),'confirmed'=>1),$remember)){
            if(Auth::check()){
                
            $errors = new MessageBag(['login' => ['WELCOME BACK  '.strtoupper(Auth::user()->name).' '.strtoupper(Auth::user()->PRENOM)]]);
            return redirect('/')->withErrors($errors);
            
                }
            }
          

        $errors = new MessageBag(['password' => ['Email and/or password invalid  or the email not confirmed yet.']]);
         return redirect()->back()->withErrors($errors)->withInput($request->only('email'));
               
            
        }

        //Logout
        public function logout() {
              Auth::logout();
            return redirect('/');
        }


        //email verification 
       public function emailVerification($code_verification_recevoire){

        $client = client::where('confirmation_code','=',$code_verification_recevoire)->first();
            if($client){
                $client->confirmed = 1;
                $client->confirmation_code = null;
                $client->save();
                Auth::login($client);
                $errors = new MessageBag(['confirmed' => ['Thanks  '.$client->name.' Now you are Loged In Enjoy ']]);
        
                return redirect('/')->withErrors($errors);
            }else{
                return redirect('/');
            }
        

       }
       public function search(){
        $coiffeurs= \App\coiffeur::where('NOM_COIFFEUR','LIKE','%'.request('search').'%')
        ->orWhere('NAME_SALON','LIKE','%'.request('search').'%')->get();

        $salons= \App\salon::where('NAME_SALON','LIKE','%'.request('search').'%')
        ->orWhere('TEMPS_OUVERTEUR','LIKE','%'.request('search').'%')
        ->orWhere('TEMPS_FERMETEUR','LIKE','%'.request('search').'%')
        ->orWhere('ADRESSE','LIKE','%'.request('search').'%')
        ->orWhere('Description_salon','LIKE','%'.request('search').'%')->get();

        $prestations= \App\pristation::where('NOM_PRESTATION','LIKE','%'.request('search').'%')
        ->orWhere('NOM_COIFFEUR','LIKE','%'.request('search').'%')
        ->orWhere('description_prestation','LIKE','%'.request('search').'%')
        ->orWhere('duree','LIKE','%'.request('search').'%')
        ->orWhere('Sex_prestation','LIKE','%'.request('search').'%')->get();

        return view('search',compact('coiffeurs','salons','prestations'));
       }
    

           
        
    

}

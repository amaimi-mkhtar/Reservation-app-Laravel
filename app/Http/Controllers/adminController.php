<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class adminController extends Controller
{
  

        public function adminLogin(Request $request){
            $errors = new MessageBag;
            $this->validate(request(),[
                'email'=> 'required|regex:/[0-9A-Za-z]*(@)[0-9A-Za-z]*\.[A-Za-z]{2,4}$/',
                'password'=>'required|alpha-num|min:8'
                
            ]);
            $remmeber= true ;
        if ( Auth::guard('admin')->attempt(array('email'=>request('email'),'password'=>request('password')),$remmeber)){
        if(Auth::guard('admin')->check()){
                    
         return redirect('/administration')->withErrors($errors);
                
                    }
                }
              
    
            $errors = new MessageBag(['password' => ['Email and/or password invalid  ']]);
             return redirect()->back()->withErrors($errors)->withInput($request->only('email'));


        }

        public function adminLogout(){
                Auth::guard('admin')->logout();
              return redirect('/admin');
          
        }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    //

      public function index(Request $request){

        // $decrypted = Crypt::encryptString(123456);
        // return $decrypted;


        if($request->session()->has('loggedUserId')){

                return back();
        }


              return view('login');
      }

      public function dashboard(Request $request){

        if(!$request->session()->has('loggedUserId')){

                return back();
        }

                return view('dashboard');
      }

      public function logout(Request $request){

                if($request->session()->has('loggedUserId')){

                    $request->session()->forget('loggedUserId');

                      return redirect('/')->with('fail',' vous vous êtes deconnecté');
                }else{

                    return  back();
                }
      }

      public function login(Request $request){





        $validated = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required',
        ]);


        $user = User::where('username','=',$request->username)->first();



        if(!$user){

                return back()->with('fail','votre nom utilisateur est incorrect');
        }else{

            //  if(Hash::check($request->password, $user->password)){

                // dd(Crypt::encryptString('12345678'));

                $decrypted = Crypt::decryptString($user->password);
             if($request->password== $decrypted){


                   $request->session()->put('loggedUserId',$user->id);

                   return redirect('dashboard')->with('loggedname',$user->username);


             }else{

                   return back()->with('fail','votre mot de passe est incorrect');
             }


        }






      }
}

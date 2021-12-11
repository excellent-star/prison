<?php

namespace App\Http\Controllers;

use App\Models\Enregistreur;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

     public function profiles(){

          return view('profile');
     }


     public function fetch_profile(Request $request){

        $id = $request->session()->get('loggedUserId');




    $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();


    $profile = DB::table('profiles')->where('enregistreur_id',$enregistreur->id)->first();




          return response()->json($profile);



     }









 public function update_profile(Request $request){


             if($request->profile_id==null){




               $profile = new Profile();

               $profile->brigade_agent_enregistreur = $request->brigade_agent_enregistreur;
               $profile->domiciliation_enregistreur = $request->domiciliation_enregistreur;
               $profile->debut_permanence = $request->debut_permanence;
               $profile->fin_permanence = $request->fin_permanence;
               $profile->nom_commandant_brigade = $request->nom_commandant_brigade;
               $profile->prenom_commandant_brigade = $request->prenom_commandant_brigade;
               $profile->grade_commandant_brigade = $request->grade_commandant_brigade;
               $profile->nom_chef_post = $request->nom_chef_post;
               $profile->prenom_chef_post = $request->prenom_chef_post;
               $profile->grade_chef_post = $request->grade_chef_post;
               $profile->fonction_enregistreur = $request->fonction_enregistreur;

               $id = $request->session()->get('loggedUserId');
    $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();



               $profile->enregistreur_id = $enregistreur->id;
               $profile->profile_complete = 1;

               $profile->save();

               return response()->json([

                'status'=>200,
                'message'=>'Vos informations sont enregistrées'
               ]);

             }else{




                $profile =  Profile::find($request->profile_id);

                // dd($profile);

                $profile->update(['brigade_agent_enregistreur'=>$request->brigade_agent_enregistreur,'domiciliation_enregistreur' => $request->domiciliation_enregistreur,'debut_permanence' => $request->debut_permanence,'fin_permanence' => $request->fin_permanence,'nom_commandant_brigade' => $request->nom_commandant_brigade,'prenom_commandant_brigade' => $request->prenom_commandant_brigade,'grade_commandant_brigade' => $request->grade_commandant_brigade,'nom_chef_post' => $request->nom_chef_post,'prenom_chef_post' => $request->prenom_chef_post,'grade_chef_post' => $request->grade_chef_post,'fonction_enregistreur' => $request->fonction_enregistreur]);


                return response()->json([

                    'status'=>200,
                    'message'=>'Vos informations sont mises à jours'
                   ]);


             }


 }







}

// end of class

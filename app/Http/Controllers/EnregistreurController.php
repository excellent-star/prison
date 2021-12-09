<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enregistreur;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class EnregistreurController extends Controller
{
    //

    public function enregistreurs(){

            return view('enregistreur');
    }


    public function addenregistreur(Request $request){


        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
        ]);



        if($validator->fails()){


               return response()->json([

                'status'=>400,
                'message'=>$validator->getMessageBag()
               ]);


        }else{


            $users = new User();

                $users->username = $request->username;
                // $users->password = Hash::make(Str::random(6));
                $users->password = Crypt::encryptString(Str::random(10));
                $users->type = 2;

                $users->save();

                $enregistreur = new Enregistreur();

                $enregistreur->user_id = $users->id;
                $enregistreur->lastname = $request->lastname;
                $enregistreur->firstname = $request->firstname;
                $enregistreur->rank = $request->rank;
                $enregistreur->date_releve = $request->took_date;

                $enregistreur->save();



                return response()->json([

                    'status'=>200,
                    'message'=>'Enregistreur insèrée avec succès'
                   ]);


        }



     }






     public function fetch_all_enregistreurs(){

        $enregistreurs = Enregistreur::orderBy('id', 'DESC')->get();;

        $output = '';

        if($enregistreurs->count() > 0){


             $output.='<table  id="myTable" class="table table-striped project-orders-table">
             <thead>
               <tr>

                 <th>Nom d\'utilisateur</th>
                 <th>Mot de passe</th>
                 <th>Nom</th>
                 <th>Prénom</th>
                 <th>Grade</th>
                 <th>Date de relève</th>

                 <th>Actions</th>
               </tr>
             </thead>
             <tbody>';

             foreach($enregistreurs as $enregistreur){


                $user = DB::table('users')->where('id', $enregistreur->user_id)->first();


                     $output.=' <tr>

                     <td>'.$user->username.'</td>
                     <td>'.Crypt::decryptString($user->password).'</td>
                     <td>'.$enregistreur->lastname.' </td>
                     <td>'.$enregistreur->firstname.' </td>
                     <td>'.$enregistreur->rank.' </td>
                     <td>'.$enregistreur->date_releve.' </td>

                     <td>
                       <div class="d-flex align-items-center">
                         <button type="button" style="background: #00C8BF;color:white;" id="'.$enregistreur->id.'" data-toggle="modal" data-target="#editenregistreur" class="btn  btn-sm btn-icon-text mr-3 edit">
                           modifier
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </button>
                         <button type="button" id="'.$enregistreur->id.'"  class="btn btn-danger btn-sm btn-icon-text delete">
                           supprimer
                           <i class="typcn typcn-delete-outline btn-icon-append"></i>
                         </button>
                       </div>
                     </td>
                   </tr>';
             }

             $output.= '</tbody>
             </table>';

             echo $output;

        }else{

                 echo '<h1 class="text-center text-secondary my-5">Aucun Enregistreur enregistrée !</h1>';
        }


 }




 public function edit_enregistreur(Request $request){


    $id = $request->id;




    $enregistreur = Enregistreur::find($id);

    $user = User::find($enregistreur->user_id);

    $array = array($enregistreur,$user);





    return response()->json($array);


}



public function update_enregistreur(Request $request){


    $validator = Validator::make($request->all(), [
        'username' => 'required|max:255',
        'lastname' => 'required|max:255',
        'firstname' => 'required|max:255',
        'rank' => 'required|max:255',
    ]);



    if($validator->fails()){


        return response()->json([

         'status'=>400,
         'message'=>$validator->getMessageBag()
        ]);


 }else{


    // dd($request);


    $id = $request->id;

    $enregistreur = Enregistreur::find($id);

    $user = User::find($enregistreur->user_id);

    // dd($user);

        $lastname = $request->lastname;
        $firstname = $request->firstname;
        $username = $request->username;
        $rank = $request->rank;
        $took_date = $request->took_date;


    $check  = User::find($username);

    // dd($check);

    $newpassword = Crypt::encryptString(Str::random(10));


    $check  = DB::table('users')->where('username', $request->username)->first();

    // dd($check);

    if($check!==null){

        if($check->username==$user->username){



            if($request->changepassword=='checked'){



                $user->update(['password'=>$newpassword]);

                $enregistreur->update(['lastname'=>$lastname,'firstname'=>$firstname,'rank'=>$rank,'date_releve'=>$took_date]);
            }else{

                $enregistreur->update(['lastname'=>$lastname,'firstname'=>$firstname,'rank'=>$rank,'date_releve'=>$took_date]);
            }


            return response()->json([

                'status'=>200,
                'message'=>'Informations Enregistreur mises à jour avec succès !'
               ]);



        }else{


            if($request->changepassword=='checked'){



                $user->update(['password'=>$newpassword]);

                $enregistreur->update(['lastname'=>$lastname,'firstname'=>$firstname,'rank'=>$rank,'date_releve'=>$took_date]);
            }else{

                $enregistreur->update(['lastname'=>$lastname,'firstname'=>$firstname,'rank'=>$rank,'date_releve'=>$took_date]);
            }


            return response()->json([

                'status'=>400,
                'message'=>'toutes Informations de l\'enregistreur mises à jour avec succès, sauf le nom de l\' utilisateur qui est utilisé par une autre personne'
               ]);


        }






    }else{






        if($request->changepassword=='checked'){



            $user->update(['username'=>$username,'password'=>$newpassword]);
        }else{

            $user->update(['username'=>$username]);
        }



        $enregistreur->update(['lastname'=>$lastname,'firstname'=>$firstname,'rank'=>$rank,'date_releve'=>$took_date]);

        return response()->json([

            'status'=>200,
            'message'=>'Informations Enregistreur mises à jour avec succès '
           ]);


    }


 }



  }





  public function delete_enregistreur(Request $request){


    $id = $request->id;

     $enregistreur = Enregistreur::find($id);

     User::destroy($enregistreur->user_id);


}




}// end of class


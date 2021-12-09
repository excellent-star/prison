<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commandant;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class CommandantController extends Controller
{
    //

    public function commandants(){

            return view('commandant');
    }


    public function addcommandant(Request $request){


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
                $users->type = 1;

                $users->save();

                $commandants = new Commandant();

                $commandants->user_id = $users->id;
                $commandants->lastname = $request->lastname;
                $commandants->firstname = $request->firstname;

                $commandants->save();



                return response()->json([

                    'status'=>200,
                    'message'=>'Commandant insèrée avec succès'
                   ]);


        }



     }






     public function fetch_all_commandants(){

        $commandants = Commandant::orderBy('id', 'DESC')->get();;

        $output = '';

        if($commandants->count() > 0){


             $output.='<table  id="myTable" class="table table-striped project-orders-table">
             <thead>
               <tr>

                 <th>Nom d\'utilisateur</th>
                 <th>Mot de passe</th>
                 <th>Nom</th>
                 <th>Prénom</th>

                 <th>Actions</th>
               </tr>
             </thead>
             <tbody>';

             foreach($commandants as $commandant){


                $user = DB::table('users')->where('id', $commandant->user_id)->first();


                     $output.=' <tr>

                     <td>'.$user->username.'</td>
                     <td>'.Crypt::decryptString($user->password).'</td>
                     <td>'.$commandant->lastname.' </td>
                     <td>'.$commandant->firstname.' </td>

                     <td>
                       <div class="d-flex align-items-center">
                         <button type="button" style="background: #00C8BF;color:white;" id="'.$commandant->id.'" data-toggle="modal" data-target="#editcommandant" class="btn  btn-sm btn-icon-text mr-3 edit">
                           modifier
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </button>
                         <button type="button" id="'.$commandant->id.'"  class="btn btn-danger btn-sm btn-icon-text delete">
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

                 echo '<h1 class="text-center text-secondary my-5">Aucune Direction enregistrée !</h1>';
        }


 }




 public function edit_commandant(Request $request){


    $id = $request->id;




    $commandant = Commandant::find($id);

    $user = User::find($commandant->user_id);

    $array = array($commandant,$user);





    return response()->json($array);


}



public function update_commandant(Request $request){


    $validator = Validator::make($request->all(), [
        'username' => 'required|max:255',
        'lastname' => 'required|max:255',
        'firstname' => 'required|max:255',
    ]);



    if($validator->fails()){


        return response()->json([

         'status'=>400,
         'message'=>$validator->getMessageBag()
        ]);


 }else{


    $id = $request->id;

    $commandant = Commandant::find($id);

    $user = User::find($commandant->user_id);

    // dd($user);

        $lastname = $request->lastname;
        $firstname = $request->firstname;
        $username = $request->username;


    $check  = User::find($username);

    // dd($check);

    $newpassword = Crypt::encryptString(Str::random(10));


    $check  = DB::table('users')->where('username', $request->username)->first();

    // dd($check);

    if($check!==null){

        if($check->username==$user->username){



            if($request->changepassword=='checked'){



                $user->update(['password'=>$newpassword]);

                $commandant->update(['lastname'=>$lastname,'firstname'=>$firstname]);
            }else{

                $commandant->update(['lastname'=>$lastname,'firstname'=>$firstname]);
            }


            return response()->json([

                'status'=>200,
                'message'=>'Informations Commandant mises à jour avec succès !'
               ]);



        }else{


            if($request->changepassword=='checked'){



                $user->update(['password'=>$newpassword]);

                $commandant->update(['lastname'=>$lastname,'firstname'=>$firstname]);
            }else{

                $commandant->update(['lastname'=>$lastname,'firstname'=>$firstname]);
            }


            return response()->json([

                'status'=>400,
                'message'=>'toutes Informations du Commandant mises à jour avec succès, sauf le nom du utilisateur qui est utilisé par une autre personne'
               ]);


        }






    }else{






        if($request->changepassword=='checked'){



            $user->update(['username'=>$username,'password'=>$newpassword]);
        }else{

            $user->update(['username'=>$username]);
        }



        $commandant->update(['lastname'=>$lastname,'firstname'=>$firstname]);

        return response()->json([

            'status'=>200,
            'message'=>'Informations Commandant mises à jour avec succès '
           ]);


    }


 }



  }





  public function delete_commandant(Request $request){


    $id = $request->id;

     $commandant = Commandant::find($id);

     User::destroy($commandant->user_id);


}




}// end of class

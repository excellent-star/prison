<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Service;
use App\Models\Visiteur;
use App\Models\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VisiteController extends Controller
{
    //





      public function visitespersonnels(){


                $directions = Direction::all();

            return view('visitespersonnels',compact('directions'));
      }


      public function visitespersonnelsservices(Request $request){


            $id = $request->id;

            $services  = DB::table('services')->where('direction_id',$id)->get();
            $option1 = '';
            $option2 = '';

            // dd($services);
                  foreach($services as $service){

                       $option1.='<option value="'.$service->id.'">'.$service->name.'</option>';
                  }

                  $option2.='<option value="">pas de services pour cette direction</option>';

            if($option1==''){

                        return $option2;
            }else{

                   return $option1;
            }




      }

      public function visitespersonnelsstore(Request $request){

        $id = $request->session()->get('loggedUserId');
        $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();


        $check = Profile::find($enregistreur->id);

        if(!$check){


            return response()->json([

                'status'=>400,
                'message'=>'vous devez premièrement renseigner vos information'
               ]);


        }

                $today = Carbon::today();

                // dd($request->service_visite);

                    $visite = new Visiteur();
                    $visite->enregistreur_id = $enregistreur->id;
                    $visite->service_id = $request->service_visite;
                    $visite->type = 0;
                    $visite->date_visite =$today;
                    $visite->nom_visiteur = $request->nom_visiteur;
                    $visite->prenom_visiteur = $request->prenom_visiteur;
                    $visite->contact_visiteur = $request->contact_visiteur;
                    $visite->quartier_visiteur = $request->quartier_visiteur;
                    $visite->lien_avec_visite = $request->lien_avec_visite;
                    $visite->numero_piece_visiteur = $request->numero_piece_visiteur;
                    $visite->type_piece = $request->type_piece;
                    $visite->fonction_visteur = $request->fonction_visteur;
                    $visite->nationalite_visiteur = $request->nationalite_visiteur;
                    $visite->nom_visite = $request->nom_visite;
                    $visite->prenom_visite = $request->prenom_visite;
                    $visite->grade_visite = $request->grade_visite;
                    $visite->quartier_ecroue = $request->quartier_ecroue;
                    $visite->heure_entree = $request->heure_entree;
                    $visite->heure_sortie = $request->heure_sortie;

                    $visite->save();

                    return response()->json([

                        'status'=>200,
                        'message'=>'les informations sont sauvegardées'
                       ]);


      }



      public function visitespersonnelsview(){

                return view('visitespersonnelsview');
      }

      public function fetch_all_personnels_visitors(Request $request){



        $id = $request->session()->get('loggedUserId');
        $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

        // $visitors = DB::table('visites')->where('enre_id',$id)->get();




        $visitors = Visiteur::orderBy('id', 'DESC')->where(['enregistreur_id'=>$enregistreur->id,'type'=>0])->get();



        $output = '';

        if($visitors->count() > 0){


             $output.='<table  id="myTable" class="table table-striped project-orders-table">
             <thead>
               <tr>

                 <th>Nom visiteur</th>
                 <th>Prénom Visiteur</th>

                 <th>Nom visité</th>
                 <th>Prénom visité</th>

                 <th>Direction visité</th>
                 <th>Service visité</th>



                 <th>Actions</th>
               </tr>
             </thead>
             <tbody>';

             foreach($visitors as $visitor){


                $service = DB::table('services')->where('id',$visitor->service_id)->first();

                $direction = DB::table('directions')->where('id',$service->direction_id)->first();



                     $output.=' <tr>

                     <td>'.$visitor->nom_visiteur.' </td>
                     <td>'.$visitor->prenom_visiteur.' </td>
                     <td>'.$visitor->nom_visite.' </td>

                     <td>'.$visitor->prenom_visite.' </td>
                     <td>'.$direction->name.' </td>



                     <td>'.$service->name.' </td>






                     <td>
                       <div class="d-flex align-items-center">
                         <a  href="#" style="background: #00C8BF;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                           modifier
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </a>
                         <button type="button" style="background: #FFD34D;color:white;" id="'.$visitor->id.'" data-toggle="modal" data-target="#editdirection" class="btn  btn-sm btn-icon-text mr-3 edit">
                           aperçu
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </button>

                       </div>
                     </td>
                   </tr>';
             }

             $output.= '</tbody>
             </table>';

             echo $output;

        }else{

                 echo '<h1 class="text-center text-secondary my-5">Aucun Visiteur enregistré !</h1>';
        }



      }



      // ecroue


      public function visitesecroues(){

        return view('visitesecroues');
   }

   public function visitesecrouesstore(Request $request){


    $id = $request->session()->get('loggedUserId');
        $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

                $today = Carbon::today();

                // dd($request->service_visite);

                    $visite = new Visiteur();
                    $visite->enregistreur_id = $enregistreur->id;
                    // $visite->service_id = $request->service_visite;
                    $visite->type = 1;
                    $visite->date_visite =$today;
                    $visite->nom_visiteur = $request->nom_visiteur;
                    $visite->prenom_visiteur = $request->prenom_visiteur;
                    $visite->contact_visiteur = $request->contact_visiteur;
                    $visite->quartier_visiteur = $request->quartier_visiteur;
                    $visite->lien_avec_visite = $request->lien_avec_visite;
                    $visite->numero_piece_visiteur = $request->numero_piece_visiteur;
                    $visite->type_piece = $request->type_piece;
                    $visite->fonction_visteur = $request->fonction_visteur;
                    $visite->nationalite_visiteur = $request->nationalite_visiteur;
                    $visite->nom_visite = $request->nom_visite;
                    $visite->prenom_visite = $request->prenom_visite;
                    // $visite->grade_visite = $request->grade_visite;
                    $visite->quartier_ecroue = $request->quartier_ecroue;
                    $visite->heure_entree = $request->heure_entree;
                    $visite->heure_sortie = $request->heure_sortie;
                    // $visite->quartier_ecroue = $request->quartier_ecroue;

                    $visite->save();

                    return response()->json([

                        'status'=>200,
                        'message'=>'les informations sont sauvegardées'
                       ]);



   }


   public function visitesecrouesview(){

         return view('visitesecrouesview');
   }


   public function fetch_all_ecroues_visitors(Request $request){




    $id = $request->session()->get('loggedUserId');
    $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

    // $visitors = DB::table('visites')->where('enre_id',$id)->get();




    $visitors = Visiteur::orderBy('id', 'DESC')->where(['enregistreur_id'=>$enregistreur->id,'type'=>1])->get();



    $output = '';

    if($visitors->count() > 0){


         $output.='<table  id="myTable" class="table table-striped project-orders-table">
         <thead>
           <tr>

             <th>Nom visiteur</th>
             <th>Prénom Visiteur</th>

             <th>Nom visité</th>
             <th>Prénom visité</th>





             <th>Actions</th>
           </tr>
         </thead>
         <tbody>';

         foreach($visitors as $visitor){


            // $service = DB::table('services')->where('id',$visitor->service_id)->first();

            // $direction = DB::table('directions')->where('id',$service->direction_id)->first();



                 $output.=' <tr>

                 <td>'.$visitor->nom_visiteur.' </td>
                 <td>'.$visitor->prenom_visiteur.' </td>
                 <td>'.$visitor->nom_visite.' </td>

                 <td>'.$visitor->prenom_visite.' </td>
                 <td>
                   <div class="d-flex align-items-center">
                     <a  href="#" style="background: #00C8BF;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                       modifier
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </a>
                     <button type="button" style="background: #FFD34D;color:white;" id="'.$visitor->id.'" data-toggle="modal" data-target="#editdirection" class="btn  btn-sm btn-icon-text mr-3 edit">
                       aperçu
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </button>

                   </div>
                 </td>
               </tr>';
         }

         $output.= '</tbody>
         </table>';

         echo $output;

    }else{

             echo '<h1 class="text-center text-secondary my-5">Aucun Visiteur enregistré !</h1>';
    }



   }







}

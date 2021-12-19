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

      public function visitespersonnelsupdate(Request $request,$id){


                        $visites = Visiteur::find($id);

                        if($visites!==null){

                            // dd($visites->enregistreur_id);

                            $directions = Direction::all();
                            return view('visitespersonnelsupdate',['directions'=>$directions,'visites'=>$visites]);

                        }else{

                              return back();
                        }

      }


      public function visitespersonnelsupdaterun(Request $request){


      $visite = Visiteur::find($request->id);

// quartier_ecroue

      $visite->update(['service_id'=>$request->service_id,'nom_visiteur'=>$request->nom_visiteur,'prenom_visiteur'=>$request->prenom_visiteur,'contact_visiteur'=>$request->contact_visiteur,'quartier_visiteur'=>$request->quartier_visiteur,'lien_avec_visite'=>$request->lien_avec_visite,'numero_piece_visiteur'=>$request->numero_piece_visiteur,'type_piece'=>$request->type_piece,'fonction_visteur'=>$request->fonction_visteur,'nationalite_visiteur'=>$request->nationalite_visiteur,'nom_visite'=>$request->nom_visite,'prenom_visite'=>$request->prenom_visite,'grade_visite'=>$request->grade_visite,'heure_entree'=>$request->heure_entree,'heure_sortie'=>$request->heure_sortie]);


        return response()->json([

            'status'=>200,
            'message'=>'les informations sont modifiées et  sauvegardées'
           ]);


      }


      public function visitespersonnelsservices(Request $request){


            $id = $request->id;

            $services  = DB::table('services')->where('direction_id',$id)->get();
            $option1 = '';
            $option2 = '';

            // dd($services);
                  foreach($services as $service){

                       $option1.='<option value="'.$service->id.'">'.$this->cut_string($service->name).'</option>';
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

        if($check===null){


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

      public function commandantvisitpersoview(){

              return view('commandantvisitpersoview');
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



                     <td>'.$this->cut_string($service->name).' </td>






                     <td>
                       <div class="d-flex align-items-center">
                         <a  href="/visitespersonnelsupdate/'.$visitor->id.'" style="background: #00C8BF;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                           modifier
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </a>
                         <a href="/previewvisitor/'.$visitor->id.'" target="_blank" type="button" style="background: #FFD34D;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                           aperçu
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </a>

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

   public function visitesecrouesupdate(Request $request,$id){

    $visites = Visiteur::find($id);

    if($visites!==null){

        // dd($visites->enregistreur_id);

        // $directions = Direction::all();
        return view('visitesecrouesupdate',['visites'=>$visites]);

    }else{

          return back();
    }

    // return view('visitesecrouesupdate');
}



public function visitesecrouesupdaterun(Request $request){


    $visite = Visiteur::find($request->id);

    // quartier_ecroue

          $visite->update(['nom_visiteur'=>$request->nom_visiteur,'prenom_visiteur'=>$request->prenom_visiteur,'contact_visiteur'=>$request->contact_visiteur,'quartier_visiteur'=>$request->quartier_visiteur,'lien_avec_visite'=>$request->lien_avec_visite,'numero_piece_visiteur'=>$request->numero_piece_visiteur,'type_piece'=>$request->type_piece,'fonction_visteur'=>$request->fonction_visteur,'nationalite_visiteur'=>$request->nationalite_visiteur,'nom_visite'=>$request->nom_visite,'prenom_visite'=>$request->prenom_visite,'quartier_ecroue'=>$request->quartier_ecroue,'heure_entree'=>$request->heure_entree,'heure_sortie'=>$request->heure_sortie]);


            return response()->json([

                'status'=>200,
                'message'=>'les informations sont modifiées et  sauvegardées'
               ]);



}




   public function visitesecrouesstore(Request $request){


    $id = $request->session()->get('loggedUserId');
        $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();


    $check = Profile::find($enregistreur->id);

        if($check===null){


            return response()->json([

                'status'=>400,
                'message'=>'vous devez premièrement renseigner vos information'
               ]);


        }




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

   public function commandantvisitecroueview(){

          return view('commandantvisitecroueview');
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
                     <a  href="/visitesecrouesupdate/'.$visitor->id.'" style="background: #00C8BF;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                       modifier
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </a>
                     <a href="/previewvisitor/'.$visitor->id.'" type="button" target="_blank" style="background: #FFD34D;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                       aperçu
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </a>

                   </div>
                 </td>
               </tr>';
         }

         $output.= '</tbody>
         </table>';

        //  dd($output);

         echo $output;

    }else{

             echo '<h1 class="text-center text-secondary my-5">Aucun Visiteur enregistré !</h1>';
    }



   }




   // this part is for both

//    public function previewvisitor(Request $request,$id){

//            $id = (int)$id;

//              $visit = Visiteur::find($id);

//              if($visit==null){

//                 return redirect('/dashboard');

//              }else{


//                    return view('previewvisitor',compact('visit'));


//              }

//    }
   // this part is for both


   public function cut_string($string){

    $array = str_split($string);

    $number = -1;

       foreach($array as $key => $val){

                if($val=='|'){

                    $number = $key;
                }
       }

         $number+=1;

       $result = substr($string,$number);

      return $result;


}






public function commandantfetch_all_ecroues_visitors(Request $request){




    // $id = $request->session()->get('loggedUserId');
    // $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

    // $visitors = DB::table('visites')->where('enre_id',$id)->get();




    $visitors = Visiteur::orderBy('id', 'DESC')->where(['type'=>1])->get();





    $output = '';

    if($visitors->count() > 0){


         $output.='<table  id="myTable" class="table table-striped project-orders-table">
         <thead>
           <tr>

           <th><input type="checkbox" id="checkAll"></th>
             <th>Nom visiteur</th>
             <th>Prénom Visiteur</th>

             <th>Nom visité</th>
             <th>Prénom visité</th>
             <th>Date</th>





             <th>Actions</th>
           </tr>
         </thead>
         <tbody>';

         foreach($visitors as $visitor){


            // $service = DB::table('services')->where('id',$visitor->service_id)->first();

            // $direction = DB::table('directions')->where('id',$service->direction_id)->first();



                 $output.=' <tr>

                 <td><input type="checkbox" name="id[]" value="'.$visitor->id.'" class="checkItem" ></td>
                 <td>'.$visitor->nom_visiteur.' </td>
                 <td>'.$visitor->prenom_visiteur.' </td>
                 <td>'.$visitor->nom_visite.' </td>

                 <td>'.$visitor->prenom_visite.' </td>
                 <td>'.date('d-m-Y', strtotime($visitor->updated_at)).'</td>
                 <td>
                   <div class="d-flex align-items-center">

                     <a href="/previewvisitor/'.$visitor->id.'" type="button" target="_blank" style="background: #FFD34D;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                       aperçu
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </a>

                   </div>
                 </td>
               </tr>';
         }

         $output.= '</tbody>
         </table>';

        //  dd($output);

         echo $output;

    }else{

             echo '<h1 class="text-center text-secondary my-5">Aucun Visiteur enregistré !</h1>';
    }



   }



   public function commandantfetch_all_personnels_visitors(Request $request){



    // $id = $request->session()->get('loggedUserId');
    // $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

    // $visitors = DB::table('visites')->where('enre_id',$id)->get();




    $visitors = Visiteur::orderBy('id', 'DESC')->where(['type'=>0])->get();



    $output = '';

    if($visitors->count() > 0){


         $output.='<table  id="myTable" class="table table-striped project-orders-table">
         <thead>
           <tr>
            <th><input type="checkbox" id="checkAll"></th>
             <th>Nom visiteur</th>
             <th>Prénom Visiteur</th>

             <th>Nom visité</th>
             <th>Prénom visité</th>

             <th>Direction visité</th>
             <th>Service visité</th>
             <th>Date</th>



             <th>Actions</th>
           </tr>
         </thead>
         <tbody>';

         foreach($visitors as $visitor){


            $service = DB::table('services')->where('id',$visitor->service_id)->first();

            $direction = DB::table('directions')->where('id',$service->direction_id)->first();



                 $output.=' <tr>

                 <td><input type="checkbox" name="id[]" value="'.$visitor->id.'" class="checkItem" ></td>
                 <td>'.$visitor->nom_visiteur.' </td>
                 <td>'.$visitor->prenom_visiteur.' </td>
                 <td>'.$visitor->nom_visite.' </td>

                 <td>'.$visitor->prenom_visite.' </td>
                 <td>'.$direction->name.' </td>



                 <td>'.$this->cut_string($service->name).' </td>
                 <td>'.date('d-m-Y', strtotime($visitor->updated_at)).'</td>






                 <td>
                   <div class="d-flex align-items-center">
                     <a  href="#" style="background: #00C8BF;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                       modifier
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </a>
                     <a href="/previewvisitor/'.$visitor->id.'" target="_blank" type="button" style="background: #FFD34D;color:white;" id="'.$visitor->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                       aperçu
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </a>

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










}// end of class

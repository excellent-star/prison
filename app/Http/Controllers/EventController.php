<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    //

      public function event(){



           return view('event');
      }

      public function eventupdate(Request $request,$id){


                    $event = Event::find($id);

                if($event!==null){

                    // dd($visites->enregistreur_id);

                    // $directions = Direction::all();
                    return view('eventupdate',['event'=>$event]);

                }else{

                    return back();
                }



      }

      public function eventupdaterun(Request $request){

        $event = Event::find($request->id);

        // dd($event);

        // quartier_ecroue

              $event->update(['title'=>$request->title,'event_date'=>$request->event_date,'event_time'=>$request->event_time,'description'=>$request->description]);


                return response()->json([

                    'status'=>200,
                    'message'=>'les informations sont modifiées et  sauvegardées'
                   ]);
      }


      public function eventstore(Request $request){


                $id = $request->session()->get('loggedUserId');
                $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

                $event = new Event();

                  $event->enregistreur_id = $enregistreur->id;
                  $event->title = $request->title;
                  $event->event_date = $request->event_date;
                  $event->event_time = $request->event_time;
                  $event->description = $request->description;

                  $event->save();

                  return response()->json([

                    'status'=>200,
                    'message'=>'Evenement enregistré avec succès'
                   ]);



      }


      public function eventview(){

           return view('eventview');
      }

      public function commandanteventview(){

        return view('commandanteventview');
   }


 public function  fetch_all_events(Request $request){




    $id = $request->session()->get('loggedUserId');
    $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

    // $visitors = DB::table('visites')->where('enre_id',$id)->get();




    $events = Event::orderBy('id', 'DESC')->where(['enregistreur_id'=>$enregistreur->id])->get();



    $output = '';

    if($events->count() > 0){


         $output.='<table  id="myTable" class="table table-striped project-orders-table">
         <thead>
           <tr>

             <th>Titre</th>
             <th>date</th>

             <th>Heure</th>






             <th>Actions</th>
           </tr>
         </thead>
         <tbody>';

         foreach($events as $event){


            // $service = DB::table('services')->where('id',$visitor->service_id)->first();

            // $direction = DB::table('directions')->where('id',$service->direction_id)->first();



                 $output.=' <tr>

                 <td>'.$event->title.' </td>
                 <td>'.$event->event_date.' </td>
                 <td>'.$event->event_time.' </td>
                 <td>
                   <div class="d-flex align-items-center">
                     <a  href="/eventupdate/'.$event->id.'" style="background: #00C8BF;color:white;" id="'.$event->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                       modifier
                       <i class="typcn typcn-edit btn-icon-append"></i>
                     </a>
                     <a href="/previewevent/'.$event->id.'" target="_blank" style="background: #FFD34D;color:white;" id="'.$event->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
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

             echo '<h1 class="text-center text-secondary my-5">Aucun Evenement enregistré !</h1>';
    }



      }





      public function  commandantfetch_all_events(Request $request){




        // $id = $request->session()->get('loggedUserId');
        // $enregistreur = DB::table('enregistreurs')->where('user_id',$id)->first();

        // $visitors = DB::table('visites')->where('enre_id',$id)->get();




        $events = Event::orderBy('id', 'DESC')->get();



        $output = '';

        if($events->count() > 0){


             $output.='<table  id="myTable" class="table table-striped project-orders-table">
             <thead>
               <tr>
                 <th><input type="checkbox" id="checkAll"></th>
                 <th>Titre</th>
                 <th>date de l\' évenement</th>

                 <th>Heure</th>

                 <th>Date de l\'enregistrement</th>






                 <th>Actions</th>
               </tr>
             </thead>
             <tbody>';

             foreach($events as $event){


                // $service = DB::table('services')->where('id',$visitor->service_id)->first();

                // $direction = DB::table('directions')->where('id',$service->direction_id)->first();



                     $output.=' <tr>
                     <td><input type="checkbox" name="id[]" value="'.$event->id.'" class="checkItem" ></td>
                     <td>'.$event->title.' </td>
                     <td>'.date('d-m-Y', strtotime($event->event_date)).' </td>
                     <td>'.$event->event_time.' </td>
                     <td>'.date('d-m-Y', strtotime($event->updated_at)).'</td>
                     <td>
                       <div class="d-flex align-items-center">
                         <a  href="#" style="background: #00C8BF;color:white;" id="'.$event->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
                           modifier
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </a>
                         <a href="/previewevent/'.$event->id.'" target="_blank" style="background: #FFD34D;color:white;" id="'.$event->id.'"  class="btn  btn-sm btn-icon-text mr-3 edit">
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

                 echo '<h1 class="text-center text-secondary my-5">Aucun Evenement enregistré !</h1>';
        }



          }











}// end of class

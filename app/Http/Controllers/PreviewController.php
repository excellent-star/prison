<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreviewController extends Controller
{
    //

         public function previewvisitor(Request $request,$id){


            $visite = DB::table('visiteurs')->where('id', $id)->first();

            // dd($user);

            if($visite==null){


                return back();
                // return redirect('dashboard');

            }else{


                $enregistreur = DB::table('enregistreurs')->where('id', $visite->enregistreur_id)->first();


                $profile = DB::table('profiles')->where('id',$enregistreur->id)->first();

                if($visite->type==0){

                    $service = DB::table('services')->where('id', $visite->service_id)->first();
                    $direction = DB::table('directions')->where('id', $service->direction_id)->first();

                      $servicename = $this->cut_string($service->name);

                      return view('previewvisitor',['visite'=>$visite,'enregistreur'=>$enregistreur,'servicename'=>$servicename,'direction'=>$direction,'profile'=>$profile]);
                }


                return view('previewvisitor',['visite'=>$visite,'enregistreur'=>$enregistreur,'profile'=>$profile]);




                // dd($profile);




                // dd($enregistreur);





            }





         }



         public function previewevent(Request $request, $id){



            $event = DB::table('events')->where('id', $id)->first();

            // dd($user);

            if($event==null){


                return back();
                // return redirect('dashboard');

            }else{


                $enregistreur = DB::table('enregistreurs')->where('id', $event->enregistreur_id)->first();


                $profile = DB::table('profiles')->where('id',$enregistreur->id)->first();




                return view('previewevent',['event'=>$event,'enregistreur'=>$enregistreur,'profile'=>$profile]);




                // dd($profile);




                // dd($enregistreur);





            }






         }




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



         //end of class
}

<?php

namespace App\Http\Controllers;
use App\Models\Direction;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //


    public function services(){

         $directions = Direction::all();

         return view('services',compact('directions'));
    }


    public function addservice(Request $request){





        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:services|max:255',
        ]);



        if($validator->fails()){


               return response()->json([

                'status'=>400,
                'message'=>$validator->getMessageBag()
               ]);


        }else{


            $service = new Service();

                $service->name = $request->name;
                $service->direction_id = $request->direction;

                $service->save();


                return response()->json([

                    'status'=>200,
                    'message'=>'Service créé avec succès'
                   ]);


        }



     }



     public function fetch_all_services(){

        $services = Service::orderBy('id', 'DESC')->get();;

        $output = '';

        if($services->count() > 0){


             $output.='<table  id="myTable" class="table table-striped project-orders-table">
             <thead>
               <tr>

                 <th>Service</th>
                 <th>Direction</th>

                 <th>Actions</th>
               </tr>
             </thead>
             <tbody>';

             foreach($services as $service){

                 $direction  = DB::table('directions')->where('id', $service->direction_id)->first();

                //  dd($service);


                     $output.=' <tr>

                     <td>'.$service->name.' </td>
                     <td>'.$direction->name.' </td>

                     <td>
                       <div class="d-flex align-items-center">
                         <button type="button" style="background: #00C8BF;color:white;" id="'.$service->id.'" data-toggle="modal" data-target="#editservice" class="btn  btn-sm btn-icon-text mr-3 edit">
                           modifier
                           <i class="typcn typcn-edit btn-icon-append"></i>
                         </button>
                         <button type="button" id="'.$service->id.'"  class="btn btn-danger btn-sm btn-icon-text delete">
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

                 echo '<h1 class="text-center text-secondary my-5">Aucun service enregistré !</h1>';
        }


 }





 public function edit_service(Request $request){


    $id = $request->id;

    $service = Service::find($id);

    $direction  = DB::table('directions')->where('id', $service->direction_id)->first();

    $result = [$service,$direction];

    return response()->json($result);


}





public function update_service(Request $request){



    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',

    ]);

    // |unique:services

    if($validator->fails()){


        return response()->json([

         'status'=>400,
         'message'=>$validator->getMessageBag()
        ]);


 }else{




    $name = $request->name;
    $id = $request->service_id;

    $direction_id=$request->direction_id;

    $service = Service::find($id);


    $check  = DB::table('services')->where('name', $name)->first();

    // dd($check);

    if($check!==null){

           if($check->name==$service->name){

              $service->update(['direction_id'=>$direction_id]);

              return response()->json([

                'status'=>200,
                'message'=>'Service mise à jour avec succès !'
               ]);


           }else{

            $service->update(['direction_id'=>$direction_id]);
            return response()->json([

              'status'=>400,
              'message'=>'Ce nom de service est déjà utilisé, la direcction est parcontre modifié'
             ]);


           }
    }else{


        $service->update(['direction_id'=>$direction_id,'name'=>$name]);

        return response()->json([

            'status'=>200,
            'message'=>'Service mise à jour avec succès'
           ]);


    }



    // $check = Service::find();

    // dd($check);

    // if($check){

    //     $service->update(['direction_id'=>$direction_id]);
    // }else{

    //     $service->update(['direction_id'=>$direction_id,'name'=>$name]);
    // }














 }



  }






  public function delete_service(Request $request){


    $id = $request->id;

    Service::destroy($id);


}




}// end of class

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direction;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Scalar\MagicConst\Dir;

class DirectionController extends Controller
{
    //

     public function directions(){

           return view('directions');

     }

     public function adddirection(Request $request){


        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:directions|max:255',
        ]);



        if($validator->fails()){


               return response()->json([

                'status'=>400,
                'message'=>$validator->getMessageBag()
               ]);


        }else{


            $direction = new Direction();

                $direction->name = $request->name;

                $direction->save();


                return response()->json([

                    'status'=>200,
                    'message'=>'Direction créée avec succès'
                   ]);


        }



     }



  public function fetch_all_directions(){

         $directions = Direction::orderBy('id', 'DESC')->get();;

         $output = '';

         if($directions->count() > 0){


              $output.='<table  id="myTable" class="table table-striped project-orders-table">
              <thead>
                <tr>

                  <th>Direction</th>

                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>';

              foreach($directions as $direction){


                      $output.=' <tr>

                      <td>'.$direction->name.' </td>

                      <td>
                        <div class="d-flex align-items-center">
                          <button type="button" style="background: #00C8BF;color:white;" id="'.$direction->id.'" data-toggle="modal" data-target="#editdirection" class="btn  btn-sm btn-icon-text mr-3 edit">
                            modifier
                            <i class="typcn typcn-edit btn-icon-append"></i>
                          </button>
                          <button type="button" id="'.$direction->id.'"  class="btn btn-danger btn-sm btn-icon-text delete">
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




  public function edit_direction(Request $request){


       $id = $request->id;

       $direction = Direction::find($id);

       return response()->json($direction);


  }


   // handle update direction

  public function update_direction(Request $request){


    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:directions|max:255',
    ]);



    if($validator->fails()){


        return response()->json([

         'status'=>400,
         'message'=>$validator->getMessageBag()
        ]);


 }else{




    $name = $request->name;
    $id = $request->id;

    $direction = Direction::find($id);



    $direction->update(['name'=>$name]);

    return response()->json([

        'status'=>200,
        'message'=>'Direction mise à jour avec succès'
       ]);




 }



  }



  public function delete_direction(Request $request){


        $id = $request->id;

        Direction::destroy($id);


  }










} // end of class

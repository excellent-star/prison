@extends('layout')


@section('page_title','Directions')
@section('content')
<div class="row" id="proBanner">
    <div class="col-12">
      {{--  <span class="d-flex align-items-center purchase-popup">  --}}
      <span class="d-flex align-items-center">
        {{--  <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>  --}}
        {{--  <a href="https://bootstrapdash.com/demo/polluxui/template/index.html?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>  --}}
        <i class="typcn typcn-delete-outline" id="bannerClose"></i>
      </span>
    </div>
  </div>
  <div class="container-scroller">

   @include('header')
   @include('underheader',['page'=>'Directions'])


   @if(Session::get('loggedname'))

        <div style="width:50%;margin:auto;" class="alert alert-success alert-dismissible fade show" role="alert">
            <p style="text-align:center;">Bienvenue Mr/Mrs    {{ Session::get('loggedname') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif


    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

     @include('sidebar')
      <div class="main-panel">
        <div class="content-wrapper">



            <div class="row">

                <div  class="col-md-12">
                  <div class="card">
                     <div style="margin:10px;">
                             <div style="float: left"></div>
                             <div style="float: right"><button style="background: #00C8BF;color:white;" data-toggle="modal" data-target="#adddirection" type="button" class="btn btn-sm">Ajouter une direction</button></div>
                     </div>


                     {{--  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                    </button>  --}}

                    <!-- Modal -->
                    <div class="modal fade" id="adddirection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle direction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                              <form action="#" method="POST" id="direction_add_form_id">

                                        @csrf

                                       <div id="form-group">
                                             <label for="name">Nom de la direction</label>
                                             <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                       </div>

                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" id="direction_add_form_button" style="background: #00C8BF;color:white;" class="btn">Enregistrer</button>
                                    </div>
                              </form>
                        </div>

                        </div>
                    </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="editdirection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier cette direction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                              <form action="#" method="POST" id="direction_add_form_id">

                                        @csrf

                                       <div id="form-group">
                                             <label for="name">Nom de la direction</label>
                                             <input name="name" type="text" class="form-control" id="edit_name" placeholder="nom de la direction" required>
                                             <input type="hidden" id="update_id">
                                       </div>

                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" id="direction_edit_form_button" style="background: #00C8BF;color:white;" class="btn">Mettre à jour</button>
                                    </div>
                              </form>
                        </div>

                        </div>
                    </div>
                    </div>



                    <div class="table-responsive pt-3" id="my_wrapper_table_div">
                      {{--  <table  id="myTable" class="table table-striped project-orders-table">
                        <thead>
                          <tr>
                            <th class="ml-5"></th>
                            <th>Direction</th>

                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td> Moyen et technique </td>

                            <td>
                              <div class="d-flex align-items-center">
                                <button type="button" style="background: #00C8BF;color:white;" class="btn  btn-sm btn-icon-text mr-3">
                                  modifier
                                  <i class="typcn typcn-edit btn-icon-append"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-icon-text">
                                  supprimer
                                  <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                </button>
                              </div>
                            </td>
                          </tr>

                        </tbody>
                      </table>  --}}
                    </div>
                  </div>
                </div>
              </div>

        </div>
       @include('footer')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


  @endsection

  @section('script-section')

<script>


{{--
        $('#myTable').DataTable({

            language: {
                url: 'fr_fr.json'
            }
        });  --}}




</script>


<script>


</script>

<script>


    fetchAllDirections();

function fetchAllDirections(){

       $.ajax({

              url:'{{ route('fetch_all_directions') }}',
              method:'GET',
              success:function(res){

                   $('#my_wrapper_table_div').html(res);

                   $('#myTable').DataTable({

                    language: {
                        url: 'fr_fr.json'
                    },
                    order:[]
                });


              }
       });
}



       $(function(){


        $('#adddirection').on('hidden.bs.modal', function () {

            $('#name').removeClass('border border-danger');
            $('#name').val('');
          })

          $('#adddirection').on('show.bs.modal', function () {


          })





               $('#direction_add_form_id').submit(function(e){

                      e.preventDefault();

                        var name = $('#name').val();

                        var formData = new FormData(this);


                           if(name==''){

                               $('#name').addClass('border border-danger');
                           }else{

                            $('#name').removeClass('border border-danger');



                            $.ajax({
                                type: "POST",
                                url: '{{ route("adddirection") }}',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success:function(res){

                                      if(res.status==200){

                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: res.message,
                                            showConfirmButton: false,
                                            timer: 3000
                                          })

                                          $('#name').val('');
                                          fetchAllDirections();


                                      }else{




                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: res.message.name,

                                          })

                                          $('#name').val('');


                                      }
                                }
                            })



                           }
               });
       });


       // edit direction

       $(document).on('click','.edit',function(e){

              e.preventDefault();

              let id = $(this).attr('id');

                $.ajax({

                       url:'{{ route("edit_direction") }}',
                       method:'GET',
                       data:{

                              id:id,

                       },
                       success:function(res){

                            $("#edit_name").val(res.name);
                            $("#update_id").val(res.id);

                       }
                });
       });

       // update direction

       $("#editdirection").submit(function(e){

             e.preventDefault();

             var name = $('#edit_name').val();
             var id = $('#update_id').val();


             $.ajax({

                url:'{{ route("update_direction") }}',
                method:'POST',
                data:{

                       name:name,
                       _token:'{{ csrf_token() }}',
                       id:id,

                },
                success:function(res){

                         if(res.status==200){


                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: res.message,
                                showConfirmButton: false,
                                timer: 3000
                              })

                              $('#edit_name').val('');
                              fetchAllDirections();

                         }else{


                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: res.message.name,

                              })

                              $('#name').val('');


                         }

                }
         });




       });



        // // delete direction


        $(document).on('click','.delete',function(e){

            e.preventDefault();

             let id = $(this).attr('id');

             Swal.fire({
                title: 'êtes vous sûr?',
                text: "l'opération inverse est impossible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00C8BF',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Annuler',
                confirmButtonText: 'oui, supprime !'
              }).then((result) => {
                if (result.isConfirmed) {



                    $.ajax({

                        url:'{{ route("delete_direction") }}',
                        method:'POST',
                        data:{

                               id:id,
                               _token:'{{ csrf_token() }}',

                        },
                        success:function(res){




                            Swal.fire(
                                'Supprimée!',
                                'cette direction est supprimé',
                                'success'
                              )

                              fetchAllDirections();
                        }
                 });



                }
              })


      });









</script>




  @endsection



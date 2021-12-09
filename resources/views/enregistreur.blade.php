@extends('layout')


@section('page_title','dashboard')
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
   @include('underheader',['page'=>'Enregistreurs'])


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
                             <div style="float: right"><button style="background: #00C8BF;color:white;" data-toggle="modal" data-target="#addenregistreur" type="button" class="btn btn-sm">Ajouter un Enregistreur</button></div>
                     </div>


                     {{--  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                    </button>  --}}

                    <!-- Modal -->
                    <div class="modal fade" id="addenregistreur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un Enregistreur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                              <form action="#" method="POST" id="enregistreur_add_form_id">

                                        @csrf

                                       <div id="form-group">
                                             <label for="username">Nom d'utilisateur</label>
                                             <input name="username" type="text" class="form-control" id="username" placeholder="nom d'utilisateur" required>
                                       </div>
                                       <div id="form-group">
                                             <label for="lastname">Nom</label>
                                             <input name="lastname" type="text" class="form-control" id="lastname" placeholder="nom de l'enregistreur" required>
                                       </div>
                                       <div id="form-group">
                                             <label for="firstname">Prénom</label>
                                             <input name="firstname" type="text" class="form-control" id="firstname" placeholder="prénom de l'enregistreur" required>
                                       </div>

                                       <div id="form-group">
                                             <label for="rank">Grade</label>
                                             <input name="rank" type="text" class="form-control" id="rank" placeholder="le grade" required>
                                       </div>

                                      <div id="form-group">
                                             <label for="took_date">Date de relève</label>
                                             <input name="took_date" type="date" class="form-control" id="took_date" placeholder="la date de la relève" required>
                                       </div>

                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" id="enregistreur_add_form_button" style="background: #00C8BF;color:white;" class="btn">Enregistrer</button>
                                    </div>
                              </form>
                        </div>

                        </div>
                    </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="editenregistreur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de l'enregistreur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                              <form action="#" method="POST" id="enregistreur_edit_form_id">

                                        @csrf

                                        <div id="form-group">
                                            <label for="username">Nom d'utilisateur</label>
                                            <input name="username" type="text" class="form-control" id="edit_username" placeholder="nom d'utilisateur" required>
                                              <input name="update_id" id="update_id" type="hidden" />
                                      </div>
                                      <div id="form-group">
                                            <label for="lastname">Nom</label>
                                            <input name="lastname" type="text" class="form-control" id="edit_lastname" placeholder="nom de l'enregistreur" required>
                                      </div>
                                      <div id="form-group">
                                            <label for="firstname">Prénom</label>
                                            <input name="firstname" type="text" class="form-control" id="edit_firstname" placeholder="prénom de l'enregistreur" required>
                                      </div>

                                      <div id="form-group">
                                            <label for="rank">Grade</label>
                                            <input name="rank" type="text" class="form-control" id="edit_rank" placeholder="Grade de l'enregistreur" required>
                                      </div>

                                      <div id="form-group">
                                            <label for="took_date">Date de relève</label>
                                            <input name="took_date" type="date" class="form-control" id="edit_took_date" placeholder="Date de la relève" required>
                                      </div>


                                      <div id="form-group">
                                        <label for="changepassword">Cocher la case ci dessous si vous voulez generer un autre mot de passe</label>
                                        <input  name="changepassword" type="checkbox" class="form-control" id="changepassword">
                                  </div>

                                       <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" id="enregistreur_edit_form_button" style="background: #00C8BF;color:white;" class="btn">Mettre à jour</button>
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


    fetchAllEnregistreurs();

function fetchAllEnregistreurs(){

       $.ajax({

              url:'{{ route('fetch_all_enregistreurs') }}',
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


        $('#addenregistreur').on('hidden.bs.modal', function () {

            $('#username').removeClass('border border-danger');
            $('#username').val('');

            $('#lastname').removeClass('border border-danger');
            $('#lastname').val('');

            $('#firstname').removeClass('border border-danger');
            $('#firstname').val('');


            $('#rank').removeClass('border border-danger');
            $('#rank').val('');


            $('#took_date').removeClass('border border-danger');
            $('#took_date').val('');



          })

          $('#adddirection').on('show.bs.modal', function () {


          })





               $('#enregistreur_add_form_id').submit(function(e){

                      e.preventDefault();

                        var name = $('#username').val();

                        var lastname = $('#lastname').val();

                        var firstname = $('#firstname').val();

                        var rank = $('#rank').val();

                        var took_date = $('#took_date').val();

                        var array_values = [];

                        if(name==''){

                            $('#username').addClass('border border-danger');

                            array_values.push('username none');

                        }

                        if(lastname==''){

                            $('#lastname').addClass('border border-danger');
                            array_values.push('lastname none');
                        }

                        if(firstname==''){

                            $('#firstname').addClass('border border-danger');
                            array_values.push('firstname none');
                        }

                        if(rank==''){

                            $('#rank').addClass('border border-danger');
                            array_values.push('firstname none');
                        }

                        if(took_date==''){

                            $('#took_date').addClass('border border-danger');
                            array_values.push('firstname none');
                        }

                        var formData = new FormData(this);


                           if(array_values.length==0){

                            $('#username').removeClass('border border-danger');
                            $('#lastname').removeClass('border border-danger');
                            $('#firstname').removeClass('border border-danger');
                            $('#rank').removeClass('border border-danger');
                            $('#took_date').removeClass('border border-danger');





                            $.ajax({
                                type: "POST",
                                url: '{{ route("addenregistreur") }}',
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

                                          $('#username').val('');
                                          $('#lastname').val('');
                                          $('#firstname').val('');
                                          $('#rank').val('');
                                          $('#took_date').val('');
                                          fetchAllEnregistreurs();


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

                       url:'{{ route("edit_enregistreur") }}',
                       method:'GET',
                       data:{

                              id:id,

                       },
                       success:function(res){



                            $("#edit_username").val(res[1].username);
                            $("#edit_lastname").val(res[0].lastname);
                            $("#edit_firstname").val(res[0].firstname);
                            $("#edit_rank").val(res[0].rank);
                            $("#edit_took_date").val(res[0].date_releve);
                            $("#update_id").val(res[0].id);

                       }
                });
       });

       // update direction

       $("#editenregistreur").submit(function(e){

             e.preventDefault();

                        var username =     $("#edit_username").val();
                        var lastname =     $("#edit_lastname").val();
                        var firstname =     $("#edit_firstname").val();
                        var rank =     $("#edit_rank").val();
                        var took_date =     $("#edit_took_date").val();
                        var id =     $("#update_id").val();


                        var changepassword = "unchecked";


                        if($('input[name="changepassword"]:checked').length > 0){

                                    changepassword = "checked";
                        }



             $.ajax({

                url:'{{ route("update_enregistreur") }}',
                method:'POST',
                data:{

                       username:username,
                       lastname:lastname,
                       firstname:firstname,
                       changepassword:changepassword,
                       rank:rank,
                       took_date:took_date,
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

                              $("#edit_username").val('');
                            $("#edit_lastname").val('');
                            $("#edit_firstname").val('');
                              fetchAllEnregistreurs();

                         }else if(res.status==400){

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: res.message,

                              })

                         }else{


                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: res.message.name,

                              })





                         }

                         fetchAllEnregistreurs();

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

                        url:'{{ route("delete_enregistreur") }}',
                        method:'POST',
                        data:{

                               id:id,
                               _token:'{{ csrf_token() }}',

                        },
                        success:function(res){




                            Swal.fire(
                                'Supprimée!',
                                'ce commandant est retiré',
                                'success'
                              )

                              fetchAllEnregistreurs();
                        }
                 });



                }
              })


      });









</script>




  @endsection



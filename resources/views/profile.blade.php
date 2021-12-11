@extends('layout')


@section('page_title','profile')
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
   @include('underheader',['page'=>'Profile'])


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
                     {{-- <div style="margin:10px;">
                             <div style="float: left"></div>
                             <div style="float: right"><button style="background: #00C8BF;color:white;" data-toggle="modal" data-target="#adddirection" type="button" class="btn btn-sm">Ajouter une direction</button></div>
                     </div> --}}


                     <div class="card-header">
                        <h2 class="card-title">Renseigner les informations suivantes</h2>
                      </div>
                      <div class="card-body">

                                <form action="#" method="POST" id="proifle_form_id">

                                    @csrf

                                <div class="row">

                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label style="color:#00C8BF;" for="brigade_agent_enregistreur">brigade de l’agent enregistreur</label>
                                                    <input name="brigade_agent_enregistreur" value="" type="text" class="form-control" id="brigade_agent_enregistreur" placeholder="brigade de l’agent enregistreur" required>
                                                    <span id="m_brigade_agent_enregistreur"></span>
                                                </div>

                                         </div>
                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label style="color:#00C8BF;" for="domiciliation_enregistreur">Domiciliation enregistreur</label>
                                                    <input name="domiciliation_enregistreur" value="" type="text" class="form-control" id="domiciliation_enregistreur" placeholder="Domiciliation enregistreu" required>
                                                    <span id="m_domiciliation_enregistreur"></span>
                                                </div>
                                         </div>

                                         <div class="col-sm-4">

                                            <div id="form-group">
                                                <label style="color:#00C8BF;" for="debut_permanence">Date de début de la permanence</label>
                                                <input name="debut_permanence" value="" type="date" class="form-control" id="debut_permanence" placeholder="Date de début de la permanence" required>
                                                <span id="m_debut_permanence"></span>
                                            </div>
                                     </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label style="color:#00C8BF;" for="fin_permanence">Date de Fin de la permanence</label>
                                            <input name="fin_permanence" value="" type="date" class="form-control" id="fin_permanence" placeholder="Date de Fin de la permanence" required>
                                            <span id="m_fin_permanence"></span>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                           <div id="form-group">
                                               <label style="color:#00C8BF;" for="nom_commandant_brigade">nom commandant de brigade</label>
                                               <input name="nom_commandant_brigade" value="" type="text" class="form-control" id="nom_commandant_brigade" placeholder="nom commandant de brigade" required>
                                               <span id="m_nom_commandant_brigade"></span>
                                           </div>
                                    </div>

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label style="color:#00C8BF;" for="prenom_commandant_brigade">Prénom commandant de brigade</label>
                                            <input name="prenom_commandant_brigade" value="" type="text" class="form-control" id="prenom_commandant_brigade" placeholder="Prénom commandant de brigade" required>
                                            <span id="m_prenom_commandant_brigade"></span>
                                        </div>
                                </div>

                           </div>

                            <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label style="color:#00C8BF;" for="grade_commandant_brigade">grade commandant de brigade</label>
                                            <input name="grade_commandant_brigade" value="" type="text" class="form-control" id="grade_commandant_brigade" placeholder="grade commandant de brigade" required>
                                            <span id="m_grade_commandant_brigade"></span>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label  style="color:#00C8BF;"for="nom_chef_post">nom chef de poste</label>
                                            <input name="nom_chef_post" type="text" value="" class="form-control" id="nom_chef_post" placeholder="nom chef de poste" required>
                                            <span id="m_nom_chef_post"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label style="color:#00C8BF;" for="prenom_chef_post">Prénom chef de poste</label>
                                            <input name="prenom_chef_post" type="text" value="" class="form-control" id="prenom_chef_post" placeholder="Prénom chef de poste" required>
                                            <span id="m_prenom_chef_post"></span>
                                        </div>
                                </div>

                            </div>


                            <div class="row mb-5">

                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label style="color:#00C8BF;" for="grade_chef_post">Grade chef de poste</label>
                                        <input name="grade_chef_post" type="text" value="" class="form-control" id="grade_chef_post" placeholder="Grade chef de poste" required>
                                        <span id="m_grade_chef_post"></span>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label style="color:#00C8BF;" for="fonction_enregistreur">Fonction de l'agent enregistreur</label>
                                        <input name="fonction_enregistreur" type="text" value="" class="form-control" id="fonction_enregistreur" placeholder="Fonction de l'agent enregistreur" required>
                                        <span id="m_fonction_enregistreur"></span>
                                    </div>
                                </div>

                                 <input id="enregistreur_id" value=""  name="enregistreur_id"  type="hidden"/>
                                 <input id="profile_id" value=""  name="profile_id"  type="hidden"/>

                                {{--  <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">Direction du visité</label>
                                            <input name="name" type="text" value="" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>
                                </div>  --}}

                            </div>









                                <div class="modal-footer">
                                    {{--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>  --}}
                                    <button type="submit" id="profile_add_form_button" style="background: #00C8BF;color:white;" class="btn">Enregistrer</button>
                                    </div>
                                </form>

                      </div>
                      <div class="card-footer text-muted">

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




    fetchProfile();

    function fetchProfile(){

           $.ajax({

                  url:'{{ route('fetch_profile') }}',
                  method:'GET',
                  dataType:'JSON',
                  success:function(res){

                      {{-- console.log(res); --}}

                      $('#brigade_agent_enregistreur').val(res.brigade_agent_enregistreur);
                      $('#domiciliation_enregistreur').val(res.domiciliation_enregistreur);
                      $('#debut_permanence').val(res.debut_permanence);
                      $('#fin_permanence').val(res.fin_permanence);
                      $('#nom_commandant_brigade').val(res.nom_commandant_brigade);
                      $('#prenom_commandant_brigade').val(res.prenom_commandant_brigade);
                      $('#grade_commandant_brigade').val(res.grade_commandant_brigade);
                      $('#nom_chef_post').val(res.nom_chef_post);
                      $('#prenom_chef_post').val(res.prenom_chef_post);
                      $('#grade_chef_post').val(res.grade_chef_post);
                      $('#fonction_enregistreur').val(res.fonction_enregistreur);
                      $('#enregistreur_id').val(res.enregistreur_id);
                      $('#profile_id').val(res.id);






                  }
           });
    }






     // store recorder information

      $('#proifle_form_id').submit(function(e){


            e.preventDefault();

                    var brigade_agent_enregistreur =   $('#brigade_agent_enregistreur').val();
                     var domiciliation_enregistreur  =  $('#domiciliation_enregistreur').val();
                   var debut_permanence =    $('#debut_permanence').val();
                     var fin_permanence =  $('#fin_permanence').val();
                     var nom_commandant_brigade =  $('#nom_commandant_brigade').val();
                     var prenom_commandant_brigade =  $('#prenom_commandant_brigade').val();
                    var grade_commandant_brigade =   $('#grade_commandant_brigade').val();
                     var nom_chef_post =  $('#nom_chef_post').val();
                    var prenom_chef_post =   $('#prenom_chef_post').val();
                    var grade_chef_post =   $('#grade_chef_post').val();
                   var fonction_enregistreur =   $('#fonction_enregistreur').val();

                   var table = [];

                   if(brigade_agent_enregistreur==''){

                       table.push('brigade_agent_enregistreur');
                       $('#brigade_agent_enregistreur').addClass('border border-danger');

                   }

                   if(domiciliation_enregistreur==''){

                    table.push('domiciliation_enregistreur');
                    $('#domiciliation_enregistreur').addClass('border border-danger');
                   }

                   if(debut_permanence==''){

                    table.push('debut_permanence');
                    $('#debut_permanence').addClass('border border-danger');
                   }

                   if(fin_permanence==''){

                    table.push('fin_permanence');
                    $('#fin_permanence').addClass('border border-danger');
                   }

                   if(nom_commandant_brigade==''){

                    table.push('nom_commandant_brigade');
                    $('#nom_commandant_brigade').addClass('border border-danger');
                   }

                   if(prenom_commandant_brigade==''){

                    table.push('prenom_commandant_brigade');
                    $('#prenom_commandant_brigade').addClass('border border-danger');
                   }

                   if(grade_commandant_brigade==''){

                    table.push('grade_commandant_brigade');
                    $('#grade_commandant_brigade').addClass('border border-danger');
                   }



                   if(nom_chef_post==''){

                    table.push('nom_chef_post');
                    $('#nom_chef_post').addClass('border border-danger');
                   }

                   if(prenom_chef_post==''){

                    table.push('prenom_chef_post');
                    $('#prenom_chef_post').addClass('border border-danger');
                   }

                   if(grade_chef_post==''){

                    table.push('grade_chef_post');
                    $('#grade_chef_post').addClass('border border-danger');
                   }

                   if(fonction_enregistreur==''){

                    table.push('fonction_enregistreur');
                    $('#fonction_enregistreur').addClass('border border-danger');
                   }

                   if(table.length ==0){




                    if(brigade_agent_enregistreur==''){

                        table.push('brigade_agent_enregistreur');
                        $('#brigade_agent_enregistreur').removeClass('border border-danger');

                    }

                    if(domiciliation_enregistreur==''){

                     table.push('domiciliation_enregistreur');
                     $('#domiciliation_enregistreur').removeClass('border border-danger');
                    }

                    if(debut_permanence==''){

                     table.push('debut_permanence');
                     $('#debut_permanence').removeClass('border border-danger');
                    }

                    if(fin_permanence==''){

                     table.push('fin_permanence');
                     $('#fin_permanence').removeClass('border border-danger');
                    }

                    if(nom_commandant_brigade==''){

                     table.push('nom_commandant_brigade');
                     $('#nom_commandant_brigade').removeClass('border border-danger');
                    }

                    if(prenom_commandant_brigade==''){

                     table.push('prenom_commandant_brigade');
                     $('#prenom_commandant_brigade').removeClass('border border-danger');
                    }

                    if(grade_commandant_brigade==''){

                     table.push('grade_commandant_brigade');
                     $('#grade_commandant_brigade').removeClass('border border-danger');
                    }



                    if(nom_chef_post==''){

                     table.push('nom_chef_post');
                     $('#nom_chef_post').removeClass('border border-danger');
                    }

                    if(prenom_chef_post==''){

                     table.push('prenom_chef_post');
                     $('#prenom_chef_post').removeClass('border border-danger');
                    }

                    if(grade_chef_post==''){

                     table.push('grade_chef_post');
                     $('#grade_chef_post').removeClass('border border-danger');
                    }

                    if(fonction_enregistreur==''){

                     table.push('fonction_enregistreur');
                     $('#fonction_enregistreur').removeClass('border border-danger');
                    }




                    var formData = new FormData(this);

                    $.ajax({
                        type: "POST",
                        url: '{{ route("update_profile") }}',
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


                                  fetchProfile();


                              }else{




                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: res.message.name,

                                  })


                                  fetchProfile();




                              }
                        }
                    })










                   }




      });


</script>











  @endsection



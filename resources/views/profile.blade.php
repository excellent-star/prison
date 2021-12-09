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

                                <form action="#" method="POST" id="visite_personnel_form_id">

                                    @csrf

                                <div class="row">

                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label for="brigade_agent_enregistreur">brigade de l’agent enregistreur</label>
                                                    <input name="brigade_agent_enregistreur" type="text" class="form-control" id="brigade_agent_enregistreur" placeholder="brigade de l’agent enregistreur" required>
                                                </div>

                                         </div>
                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label for="domiciliation_enregistreur">Domiciliation enregistreur</label>
                                                    <input name="domiciliation_enregistreur" type="text" class="form-control" id="domiciliation_enregistreur" placeholder="Domiciliation enregistreu" required>
                                                </div>
                                         </div>

                                         <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="debut_permanence">Date de début de la permanence</label>
                                                <input name="debut_permanence" type="date" class="form-control" id="debut_permanence" placeholder="Date de début de la permanence" required>
                                            </div>
                                     </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="fin_permanence">Date de Fin de la permanence</label>
                                            <input name="fin_permanence" type="date" class="form-control" id="fin_permanence" placeholder="Date de Fin de la permanence" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                           <div id="form-group">
                                               <label for="nom_commandant_brigade">nom commandant de brigade</label>
                                               <input name="nom_commandant_brigade" type="text" class="form-control" id="nom_commandant_brigade" placeholder="nom commandant de brigade" required>
                                           </div>
                                    </div>

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="prenom_commandant_brigade">Prénom commandant de brigade</label>
                                            <input name="prenom_commandant_brigade" type="text" class="form-control" id="prenom_commandant_brigade" placeholder="Prénom commandant de brigade" required>
                                        </div>
                                </div>

                           </div>

                            <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="grade_commandant_brigade">grade commandant de brigade</label>
                                            <input name="grade_commandant_brigade" type="text" class="form-control" id="grade_commandant_brigade" placeholder="grade commandant de brigade" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="nom_chef_post">nom chef de poste</label>
                                            <input name="nom_chef_post" type="text" class="form-control" id="nom_chef_post" placeholder="nom chef de poste" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="prenom_chef_post">Prénom chef de poste</label>
                                            <input name="prenom_chef_post" type="text" class="form-control" id="prenom_chef_post" placeholder="Prénom chef de poste" required>
                                        </div>
                                </div>

                            </div>


                            <div class="row mb-5">

                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="grade_chef_post">Grade chef de poste</label>
                                        <input name="grade_chef_post" type="text" class="form-control" id="grade_chef_post" placeholder="Grade chef de poste" required>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="fonction_enregistreur">Fonction de l'agent enregistreur</label>
                                        <input name="fonction_enregistreur" type="text" class="form-control" id="fonction_enregistreur" placeholder="Fonction de l'agent enregistreur" required>
                                    </div>
                                </div>

                                {{--  <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">Direction du visité</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>
                                </div>  --}}

                            </div>









                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="direction_add_form_button" style="background: #00C8BF;color:white;" class="btn">Enregistrer</button>
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


</script>








  @endsection



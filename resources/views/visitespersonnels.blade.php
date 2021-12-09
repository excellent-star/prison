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
   @include('underheader',['page'=>'Visite de Personnels'])


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
                        <h2 class="card-title">Enregistrer un visiteur</h2>
                      </div>
                      <div class="card-body">

                                <form action="#" method="POST" id="visite_personnel_form_id">

                                    @csrf

                                <div class="row">

                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label for="nom_visiteur">Nom du visiteur</label>
                                                    <input name="nom_visiteur" type="text" class="form-control" id="nom_visiteur" placeholder="Nom du visiteur" required>
                                                </div>

                                         </div>
                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label for="prenom_visiteur">Prénom du visiteur</label>
                                                    <input name="prenom_visiteur" type="text" class="form-control" id="prenom_visiteur" placeholder="Prénom du visiteur" required>
                                                </div>
                                         </div>

                                         <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="contact_visiteur">Contact visiteur</label>
                                                <input name="contact_visiteur" type="tel" class="form-control" id="contact_visiteur" placeholder="Contact du visiteur" required>
                                            </div>
                                     </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-4">

                                           <div id="form-group">
                                               <label for="name">Quartier de résidence</label>
                                               <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                           </div>

                                    </div>
                                    <div class="col-sm-4">

                                           <div id="form-group">
                                               <label for="name">Lien avec le visité</label>
                                               <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                           </div>
                                    </div>

                                    <div class="col-sm-4">

                                       <div id="form-group">
                                           <label for="name">Numéro pièce du visiteur</label>
                                           <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                       </div>
                                </div>

                           </div>

                            <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">Type de pièce</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">Fonction du visiteur (optionel)</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="name">Nationalité du visiteur</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="name">Nom du visité</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="name">Prénom du visité</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">

                                <div id="form-group">
                                    <label for="name">Direction du visité</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                </div>
                            </div>

                            </div>

                            <div class="row">

                                        <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="name">Service du visité</label>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="name">Date de la visite</label>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">Heure d entrée</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>
                                    </div>

                               </div>

                               <div class="row">

                                        <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="name">Heure de sortie</label>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="name">Domiciliation de l agent enregistreur</label>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">Date de début de la permanence</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>
                                    </div>

                                 </div>


                               <div class="row">

                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="name">Date de fin de la permanence</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="name">brigade de l’agent enregistreur</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">

                                <div id="form-group">
                                    <label for="name">nom commandant de brigade</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                </div>
                            </div>

                             </div>

                                <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">prénom commandant de brigade</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">grade commandant de brigade</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="name">nom chef de poste</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                    </div>
                                </div>

                                </div>


                                <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">prénoms du chef de poste</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="name">grade du chef de poste</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="nom de la direction" required>
                                        </div>
                                    </div>



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



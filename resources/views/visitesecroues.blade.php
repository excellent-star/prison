@extends('layout')


@section('page_title','visites-ecroues')
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
   @include('underheader',['page'=>'Visite Ecroues'])


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

                                <form action="#" method="POST" id="visite_ecroue_form_id">

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
                                               <label for="quartier_visiteur">Quartier de résidence</label>
                                               <input name="quartier_visiteur" type="text" class="form-control" id="quartier_visiteur" placeholder="Quartier de résidence" required>
                                           </div>

                                    </div>
                                    <div class="col-sm-4">

                                           <div id="form-group">
                                               <label for="lien_avec_visite">Lien avec l’écroue</label>
                                               <input name="lien_avec_visite" type="text" class="form-control" id="lien_avec_visite" placeholder="Lien avec l’écroue" required>
                                           </div>
                                    </div>

                                    <div class="col-sm-4">

                                       <div id="form-group">
                                           <label for="numero_piece_visiteur">Numéro pièce du visiteur</label>
                                           <input name="numero_piece_visiteur" type="text" class="form-control" id="numero_piece_visiteur" placeholder="Numéro pièce du visiteur" required>
                                       </div>
                                </div>

                           </div>

                            <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="type_piece">Type de pièce</label>
                                            <input name="type_piece" type="text" class="form-control" id="type_piece" placeholder="Type de pièce" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="fonction_visiteur">Fonction du visiteur (optionel)</label>
                                            <input name="fonction_visiteur" type="text" class="form-control" id="fonction_visiteur" placeholder="Fonction du visiteur (optionel)" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="nationalite_visiteur">Nationalité du visiteur</label>
                                        <input name="nationalite_visiteur" type="text" class="form-control" id="nationalite_visiteur" placeholder="Nationalité du visiteur" required>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="nom_visite">Nom de l’écroue</label>
                                        <input name="nom_visite" type="text" class="form-control" id="nom_visite" placeholder="Nom de l’écroue" required>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="prenom_visite">Prénom de l’écroue</label>
                                        <input name="prenom_visite" type="text" class="form-control" id="prenom_visite" placeholder="Prénom de l’écroue" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">

                                <div id="form-group">
                                    <label for="quartier_ecroue">Quartier de l’écroue</label>
                                    <input name="quartier_ecroue" type="text" class="form-control" id="quartier_ecroue" placeholder="Quartier de l’écroue" required>
                                </div>
                            </div>

                            </div>

                            <div class="row">


                                        <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="heure_entree">Heure d entrée</label>
                                                <input name="heure_entree" type="text" class="form-control" id="heure_entree" placeholder="Heure d entrée" required>
                                            </div>
                                       </div>

                                       <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="heure_sortie">Heure de sortie</label>
                                            <input name="heure_sortie" type="text" class="form-control" id="heure_sortie" placeholder="Heure de sortie" required>
                                        </div>

                                    </div>



                               </div>










                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="ecroue_add_form_button" style="background: #00C8BF;color:white;" class="btn">Enregistrer</button>
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

    $("#visite_ecroue_form_id").submit(function(e){

        e.preventDefault();

        var formData = new FormData(this);


        $.ajax({
         type: "POST",
         url: '{{ route("visitesecrouesstore") }}',
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

                   {{--  $("#visite_ecroue_form_id").reset();  --}}

                   document.getElementById("visite_ecroue_form_id").reset();


               }else{




                 Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: res.message.name,

                   })

                   {{--  $("#visite_ecroue_form_id").reset();  --}}
                   document.getElementById("visite_ecroue_form_id").reset();


               }
         }
     })


 });


</script>








  @endsection



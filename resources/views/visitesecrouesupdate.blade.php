@extends('layout')


@section('page_title','update-visites-personnels')
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
   @include('underheader',['page'=>'Modification d\'une visite'])


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
                                                    <input name="nom_visiteur" type="text" class="form-control" id="nom_visiteur" placeholder="Nom du visiteur" value="{{ $visites->nom_visiteur }}" required>
                                                </div>

                                         </div>
                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label for="prenom_visiteur">Prénom du visiteur</label>
                                                    <input name="prenom_visiteur" type="text" class="form-control" id="prenom_visiteur" placeholder="Prénom du visiteur" value="{{ $visites->prenom_visiteur }}" required>
                                                </div>
                                         </div>

                                         <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="contact_visiteur">Contact visiteur</label>
                                                <input name="contact_visiteur" type="text" class="form-control" id="contact_visiteur" placeholder="Contact du visiteur" value="{{ $visites->contact_visiteur }}" required>
                                            </div>
                                     </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-4">

                                           <div id="form-group">
                                               <label for="quartier_visiteur">Quartier de résidence</label>
                                               <input name="quartier_visiteur" type="text" class="form-control" id="quartier_visiteur" placeholder="Quartier visiteur" value="{{ $visites->quartier_visiteur }}" required>
                                           </div>

                                    </div>
                                    <div class="col-sm-4">

                                           <div id="form-group">
                                               <label for="lien_avec_visite">Lien avec le visité</label>
                                               <input name="lien_avec_visite" type="text" class="form-control" id="lien_avec_visite" placeholder="Lien avec le visité" value="{{ $visites->lien_avec_visite }}" required>
                                           </div>
                                    </div>

                                    <div class="col-sm-4">

                                       <div id="form-group">
                                           <label for="numero_piece_visiteur">Numéro pièce du visiteur</label>
                                           <input name="numero_piece_visiteur" type="text" class="form-control" id="numero_piece_visiteur" placeholder="Numéro pièce du visiteur" value="{{ $visites->numero_piece_visiteur }}" required>
                                       </div>
                                </div>

                           </div>

                            <div class="row">

                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="type_piece">Type de pièce</label>
                                            <input name="type_piece" type="text" class="form-control" id="type_piece" placeholder="type de pièce" value="{{ $visites->type_piece }}" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-4">

                                        <div id="form-group">
                                            <label for="fonction_visteur">Fonction du visiteur (optionel)</label>
                                            <input name="fonction_visteur" type="text" class="form-control" id="fonction_visteur" placeholder="Fonction du visiteur" value="{{ $visites->fonction_visiteur }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="nationalite_visiteur">Nationalité du visiteur</label>
                                        <input name="nationalite_visiteur" type="text" class="form-control" id="nationalite_visiteur" placeholder="Nationalité du visiteur" value="{{ $visites->nationalite_visiteur }}" required>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="nom_visite">Nom du visité</label>
                                        <input name="nom_visite" type="text" class="form-control" id="nom_visite" placeholder="Nom du visité" value="{{ $visites->nom_visite }}" required>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="prenom_visite">Prénom du visité</label>
                                        <input name="prenom_visite" type="text" class="form-control" id="prenom_visite" placeholder="Prénom du visité" value="{{ $visites->prenom_visiteur }}" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">

                                    <div id="form-group">
                                        <label for="heure_entree">Heure d entrée</label>
                                        <input name="heure_entree" type="text" class="form-control" id="heure_entree" placeholder="Heure d entrée" value="{{ $visites->heure_entree }}" required>
                                    </div>
                                </div>

                            </div>



                               <div class="row">

                                        <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="heure_sortie">Heure de sortie</label>
                                                <input name="heure_sortie" type="text" class="form-control" id="heure_sortie" placeholder="Heure de sortie" value="{{ $visites->heure_sortie }}" required>
                                            </div>

                                        </div>


                                        <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="heure_sortie">Quartier ecroue</label>
                                                <input name="quartier_ecroue" type="text" class="form-control" id="heure_sortie" placeholder="Heure de sortie" value="{{ $visites->quartier_ecroue }}" required>
                                            </div>

                                        </div>




                                 </div>


                                 <input type="hidden" name="enregistreur_id" value="{{ $visites->enregistreur_id }}">
                                 {{--  <input type="hidden" name="service_id" value="{{ $visites->service_id }}">  --}}
                                 <input type="hidden" name="id" value="{{ $visites->id }}">








                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="personnel_add_form_button" style="background: #00C8BF;color:white;" class="btn">Sauvegarder la modification</button>
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


{{--  getServices('#direction_visite');  --}}


 {{--  function getServices($selector){

        var direction_id = $($selector).val();

        $.ajax({

            url:'{{ route("visitespersonnelsservices") }}',
            method:'GET',
            data:{

                   id:direction_id,

            },
            success:function(res){

                 $('#service_visite').html(res);

            }
     });
 }  --}}

 {{--  $('#direction_visite').on('change',function(){

          getServices($(this));


 });  --}}





    $("#visite_personnel_form_id").submit(function(e){

           e.preventDefault();

           var formData = new FormData(this);


           $.ajax({
            type: "POST",
            url: '{{ route("visitesecrouesupdaterun") }}',
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


                      {{--  $("#visite_personnel_form_id").reset();  --}}
                      {{--  document.getElementById("visite_personnel_form_id").reset();  --}}



                  }else{




                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message,

                      })

                      {{--  $("#visite_personnel_form_id").reset();  --}}
                      document.getElementById("visite_personnel_form_id").reset();




                  }
            }
        })


    });




</script>








  @endsection



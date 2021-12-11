@extends('layout')


@section('page_title','evenement')
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
   @include('underheader',['page'=>'Evenement'])


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
                        <h2 class="card-title">Enregistrer un evenement</h2>
                      </div>
                      <div class="card-body">

                                <form action="#" method="POST" id="event_form_id">

                                    @csrf

                                <div class="row">

                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label for="title">Titre</label>
                                                    <input name="title" type="text" class="form-control" id="title" placeholder="Titre evenement" required>
                                                </div>

                                         </div>
                                         <div class="col-sm-4">

                                                <div id="form-group">
                                                    <label for="event_date">Date de l'evenement</label>
                                                    <input name="event_date" type="date" class="form-control" id="event_date" placeholder="Date de l'evenement" required>
                                                </div>
                                         </div>

                                         <div class="col-sm-4">

                                            <div id="form-group">
                                                <label for="event_time">l'heure de l'evenement</label>
                                                <input name="event_time" type="tel" class="form-control" id="event_time" placeholder="l'heure de l'evenement" required>
                                            </div>
                                     </div>

                                </div>

                                <div class="row my-5">

                                    <div class="col-sm-12">

                                           <div id="form-group">
                                               <label for="description">Description de l'evenemnt</label>
                                               <textarea name="description" rows="10" cols="50" id="description" class="form-control"></textarea>
                                           </div>

                                    </div>


                                </div>















                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="event_form_button" style="background: #00C8BF;color:white;" class="btn">Enregistrer</button>
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


    $("#event_form_id").submit(function(e){

        e.preventDefault();

        var formData = new FormData(this);


        $.ajax({
         type: "POST",
         url: '{{ route("eventstore") }}',
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



                   document.getElementById("event_form_id").reset();


               }else{




                 Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: res.message.name,

                   })


                   document.getElementById("event_form_id").reset();


               }
         }
     })


 });



</script>








  @endsection



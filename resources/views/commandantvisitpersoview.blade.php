@extends('layout')


@section('page_title','visteurs-view')
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
   @include('underheader',['page'=>'Voir visiteurs'])


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
                             {{--  <div style="float: right"><button style="background: #00C8BF;color:white;" data-toggle="modal" data-target="#adddirection" type="button" class="btn btn-sm">Ajouter une direction</button></div>  --}}
                     </div>


                     {{--  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                    </button>  --}}





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


    fetchAllPersonnelsvisitors();

function fetchAllPersonnelsvisitors(){

       $.ajax({

              url:'{{ route('commandantfetch_all_personnels_visitors') }}',
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











       // edit direction



       // update direction





        // // delete direction












</script>




  @endsection



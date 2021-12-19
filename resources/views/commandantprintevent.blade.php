<?php


$array_ids = explode("-", $ids);



?>
@extends('layout')


@section('page_title','preview')

<style>
    @page { size: auto;  margin: 0mm; }


    @media print {
        * {
            -webkit-print-color-adjust: exact;
        }
    }


</style>
@section('content')




<div  class="container mt-5">

    <div  class="card">

          <div class="card-header">
                 <button class="btn btn-primary" id="print_button">Imprimer</button>
          </div>

            <?php


            foreach($array_ids as $id){



                $event =  DB::table('events')->where('id',$id)->first();

                $enregistreur = DB::table('enregistreurs')->where('id', $event->enregistreur_id)->first();


                $profile = DB::table('profiles')->where('id',$enregistreur->id)->first();

                if($event!==null){



                            ?>




                <div  style="background-image: url({{ asset('images/backgroundreceipt.png')}});background-repeat:no-repeat;background-position: bottom 50px right 20px;" class="card-body">

                    <div style="border-bottom: 1px dotted black;display:flex;justify-content:space-between;">
                           <div>Fiche Evenement</div>
                           <div>{{ date('d-m-Y', strtotime($event->updated_at)); }}</div>
                    </div>

                    <div style="margin-top: 10px;margin-bottom:15px;">

                               {{--  LOGO SP  --}}
                              <p style="text-align: center;"> <img style="height: 150px;" width="150px;" src="{{ asset('images/LOGO_SP-removebg-preview.png') }}" </p>


                    </div>

                    <div>
                           <div class="row">

                                        <div class="col-sm-4">
                                           <p><b>Titre</b>:...... {{ $event->title }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                           <p><b>Date</b>:...... {{ date('d-m-Y', strtotime($event->event_date)); }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                           <p><b>Time</b>:...... {{ $event->event_time }}</p>
                                        </div>
                           </div>

                           <div class="row">

                                      <div class="col-sm-12">

                                                <h6 style="text-align: center;margin-top:10px;margin-bottom:5px;"><b>Description</b></h6>
                                             <p>{{ $event->description }}</p>
                                      </div>
                           </div>

                           <h5 style="text-align:center;text-decoration:underline;">Agent Enregistreur</h5>

                           <div class="row">


                                   <div class="col-sm-5">
                                       <p><b>Nom</b>:...... {{ $enregistreur->lastname }} {{ $enregistreur->firstname }}</p>
                                       <p><b>Grade</b>:...... {{ $enregistreur->rank }}</p>
                                       <p><b>Brigade</b>:...... {{ $profile->brigade_agent_enregistreur }}</p>
                                       <p><b>Date de relève</b>:...... {{ date('d-m-Y', strtotime($enregistreur->date_releve)); }}</p>
                                       <p><b>Début Permanence</b>:...... {{ date('d-m-Y', strtotime($profile->debut_permanence)); }}</p>
                                       <p><b>Fin Permanence</b>:...... {{ date('d-m-Y', strtotime($profile->fin_permanence)); }}</p>
                                       <p><b>Fonction</b>:...... {{ $profile->fonction_enregistreur }}</p>
                                       <p><b>Domiciliation</b>:...... {{ $profile->domiciliation_enregistreur }}</p>


                                   </div>
                                   <div class="col-sm-1"></div>
                                   <div class="col-sm-6">

                                       <p><b>Nom commandant de brigade</b>:......{{ $profile->nom_commandant_brigade }} {{ $profile->prenom_commandant_brigade }}</p>
                                       <p><b>Grade commandant de brigade</b>:...... {{ $profile->grade_commandant_brigade }}</p>
                                       <p><b>Nom chef de poste</b>:...... {{ $profile->nom_chef_post }} {{ $profile->prenom_chef_post }}</p>
                                       <p><b>Grade chef de poste</b>:...... {{ $profile->grade_chef_post }}</p>
                                   </div>
                           </div>



                    </div>





                    <div style="border-bottom:1px dotted black;margin-top:2px;margin-bottom:2px;">

                   </div>



                </div>



                            <?php




                }


            }


            ?>


    </div>
</div>


@endsection

@section('script-section')

<script>


    $(function(){


        $('#print_button').click(function(){

            $(this).css("display","none");
            $('.card-header').css("display","none");

                 window.print();

                 $(this).css("display","block");
            $('.card-header').css("display","block");
        });


 });



</script>




@endsection















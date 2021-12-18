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

    <div style="background-image: url({{ asset('images/backgroundreceipt.png')}});background-repeat:no-repeat;background-position: bottom 50px right 20px;"  class="card">

          <div class="card-header">
                 <button class="btn btn-primary" id="print_button">Imprimer</button>
          </div>

                 <div class="card-body">

                     <div style="border-bottom: 1px dotted black;display:flex;justify-content:space-between;">
                            <div>Fiche de visite</div>
                            <div>{{ date('d-m-Y', strtotime($visite->updated_at)); }}</div>
                     </div>

                     <div style="margin-top: 10px;margin-bottom:15px;">

                                {{--  LOGO SP  --}}
                               <p style="text-align: center;"> <img style="height: 150px;" width="150px;" src="{{ asset('images/LOGO_SP-removebg-preview.png') }}" </p>


                     </div>

                     <div>
                            <div class="row">

                                     <div class="col-sm-5">

                                              <h5 style="text-decoration: underline;text-align:center;margin-top:3px;margin-bottom:10px;">Visiteur</h5>

                                              <p><b>Nom</b>:...... {{ $visite->nom_visiteur }} {{ $visite->prenom_visiteur }}</p>
                                              <p><b>Contact</b>:...... {{ $visite->contact_visiteur }}</p>
                                              <p><b>Quartier</b>:...... {{ $visite->quartier_visiteur }}</p>
                                              <p><b>Fonction</b>:...... {{ $visite->fonction_visteur }}</p>
                                              <p><b>Nationalité</b>:...... {{ $visite->nationalite_visiteur }}</p>
                                              <p><b>Lien avec l’écroue :</b>:...... {{ $visite->lien_avec_visite }}</p>
                                              <p><b>Numéro pièce : :</b>:...... {{ $visite->numero_piece_visiteur }}</p>
                                              <p><b>Type de pièce  : :</b>:...... {{ $visite->type_piece }}</p>
                                              <p><b>Heure d entrée  : :</b>:...... {{ $visite->heure_entree }}</p>
                                              <p><b>Heure de sortie  : :</b>:...... {{ $visite->heure_sortie }}</p>
                                     </div>
                                     <div class="col-sm-2"></div>
                                     <div class="col-sm-5">
                                            <h5 style="text-decoration: underline;text-align:center;margin-top:3px;margin-bottom:10px;">Visité</h5>

                                            <p><b>Nom</b>:...... {{ $visite->nom_visite }}  {{ $visite->prenom_visite }}</p>
                                            @if($visite->type==1)
                                            <p><b>Quartier</b>:...... {{ $visite->quartier_ecroue }} B</p>
                                            @endif
                                            @if($visite->type==0)
                                                <p><b>Grade</b>:...... {{ $visite->grade_visite }}</p>
                                                <p><b>Direction</b>:...... {{ $direction->name }}</p>
                                                <p><b>Service</b>:...... {{ $servicename }}</p>
                                            @endif


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















<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/dashboard">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Tableau de Bord</span>

      </a>
    </li>

    <?php

    use Illuminate\Support\Facades\DB;

    $display  = DB::table('users')->where('id',session()->get('loggedUserId'))->first();



    if($display->type==0){


      ?>




        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#directions" aria-expanded="false" aria-controls="ui-basic">
            <i class="typcn typcn-home menu-icon"></i>
            <span class="menu-title">Directions</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="directions">
            <ul class="nav flex-column sub-menu">
              {{--  <li class="nav-item"> <a class="nav-link" href="">Ajouter une direction</a></li>  --}}
              <li class="nav-item"> <a class="nav-link" href="{{ route('directions') }}">Voir des directions</a></li>
              {{--  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Voir les directions</a></li>  --}}
              {{--  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>  --}}
            </ul>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Services</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="services">
              <ul class="nav flex-column sub-menu">
                {{--  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Ajouter un service</a></li>  --}}
                <li class="nav-item"> <a class="nav-link" href="{{ route('services') }}">Voir les services</a></li>
                {{--  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>  --}}
              </ul>
            </div>
          </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="typcn typcn-group menu-icon"></i>
            <span class="menu-title">Utilisateurs</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{ route('commandants') }}">Commandants</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('enregistreurs') }}">Enregistreurs</a></li>
            </ul>
          </div>
        </li>


    <?php



    }else if($display->type==1){


        ?>



        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#visite2" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-home menu-icon"></i>
              <span class="menu-title">Deplier</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="visite2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('commandantvisitpersoview') }}">Personnels </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('commandantvisitecroueview') }}">Ecroues </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('commandanteventview') }}">Evenement</a></li>

              </ul>
            </div>
          </li>

          <?php



    }else{


           ?>


           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#visite1" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-home menu-icon"></i>
              <span class="menu-title">Personnels
            </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="visite1">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{ route('visitespersonnels') }}">Enregistrer un visiteur </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('visitespersonnelsview') }}">Voir les visiteurs</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#evenements" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-home menu-icon"></i>
              <span class="menu-title">Evenement</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="evenements">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{ route('event') }}">Enregistrer un evenement</a></li><li class="nav-item"> <a class="nav-link" href="{{ route('eventview') }}">Voir les les evenements enregistrés</a></li>

              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#visite2" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-home menu-icon"></i>
              <span class="menu-title">écroues</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="visite2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('visitesecroues') }}">Enregistrer un visiteur </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('visitesecrouesview') }}">Voir les visiteurs enregistrés</a></li>

              </ul>
            </div>
          </li>


           <?php
    }


    ?>






  </ul>
</nav>
<!-- partial -->

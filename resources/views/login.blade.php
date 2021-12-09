@extends('layout')


@section('page_title','login')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div style="background-image: url('images/arton4582.png');background-size:cover;background-position: center;background-repeat: no-repeat;background-attachment: fixed" class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              {{--  <div  class="brand-logo">  --}}
              <p style="text-align: center;">
                <img style="height:150px;width:150px;"  src="../../images/LOGO_SP-removebg-preview white-bg.png" alt="logo">
              </p>
              <h4 style="text-align: center;">Welcome! Connectez-vous</h4>

              @if(Session::get('fail'))



              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p style="text-align: center;">{{ Session::get('fail') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>



              @endif
              {{--  <h6 class="font-weight-light">Sign in to continue.</h6>  --}}
              <form method="POST" action="/login" class="pt-3">

                @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @csrf

                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" value="{{ old('username') }}" id="username" placeholder="Nom d'utilisateur">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Mot de passe">
                </div>
                <div class="mt-3">
                  {{--  <a  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SE CONNECTER</a>  --}}

                  <button  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SE CONNECTER</button>
                </div>
                {{--  <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="typcn typcn-social-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>  --}}
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  @endsection

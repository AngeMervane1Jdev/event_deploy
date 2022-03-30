@extends('admin.app')
@section('content')
 <link rel="stylesheet" href="{{ secure_asset('css/adminTable.css')}}">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
</nav>
<section style="background-color: #eee;">
    <div class="container py-5">
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class=" text-center">
             
              <img src="{{ secure_asset('images/user-admin.png')}}" alt="avatar" class="rounded-circle img-fluid mt-2" style="width: 150px;">
              <div class="file-inpute">
                <form action="" method="get">
                    <input
                    type="file"
                    name="file-input"
                    id="file-input"
                    class="file-input__input"
                  />
                </form>

                <label class="file-inpute__label" for="file-input">
                    <img src="https://img.icons8.com/material-outlined/24/fa314a/camera--v2.png"/>
                 </label >
              </div>
              <h5 class="my-3">John Smith</h5>
              <p class="text-muted mb-1">Administrateur</p>
              <p class="text-muted mb-4">admin@gamil.com</p>
              <div class=" justify-content-center mb-2">
                <button type="button" class="btn btn-primary " onclick="affCache('ajouter')">Follow</button>
              
              </div>
            </div>
          </div>
       
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0" style="color: black ; font-weight:bold">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Johnatan Smith</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0" class="mb-0" style="color: black ; font-weight:bold">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">example@example.com</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0" class="mb-0" style="color: black ; font-weight:bold">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(229) 234-5678</p>
                </div>
              </div>
            
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0" class="mb-0" style="color: black ; font-weight:bold">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                </div>
              </div>
            </div>
          </div>
        
        </div>

<div class="container scroll-to" id="ajouter"  style="display: none">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">

              <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row">
                        <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                        <div class="col-md-6">
                            <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                      <div class="col-md-6">
                          <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                      </div>
                  </div>
                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' Email') }}</label>

                      <div class="col-md-6">
                          <input id="event_description" type="texterea" class="form-control  required autocomplete="email">
                     
                      </div>
                  </div>
                    <div class="form-group row">
                      <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                      <div class="col-md-6">
                          <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                      </div>
                  </div>
            
                  
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Modifier') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
      </div>
    </div>


    <script type="text/javascript">
    function affCache(idDiv) {
    var div = document.getElementById(idDiv);
    if (div.style.display == "")
    div.style.display = "none";
    else
    div.style.display = "";
    }
    </script>



@endsection
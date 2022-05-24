@extends('admin.app')

@section('style')

     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
     <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
     <!-- MDB -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />  
     
  <style>


    .form-control:focus {
        box-shadow: none;
        border-color:#3c53a2;
    }

    .profile-button {
        background: #3c53a2;
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #3c53a2;
    }

    .profile-button:focus {
        background: #3c53a2;
        box-shadow: none
    }

    .profile-button:active {
        background: #3c53a2;
        box-shadow: none
    }

    .back:hover {
        color: #3c53a2;
        cursor: pointer
    }
  </style>
@endsection

@section('content')

  <div class="container rounded bg-white mt-5">
  <form method="POST" action="{{ route('user_update',$user->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            @if ($user->typeuser->id==3)
            <div class="p-3 py-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-primary">Modifier l'utilisateur</h2>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Nom et prénom</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ $user->name }}">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Adresse Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ $user->email }}">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Contact</label>
                      <input type="text" class="form-control  @error('contact') is-invalid @enderror" placeholder="Contact" name="contact" value="{{ $user->contact }}">
                      @error('contact')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Image</label>
                      <input type="file" class="form-control"  placeholder="Image de profil" name="profil_image" value="{{ $user->profil_image }}">
                    </div>
                </div>
                <div class="mt-5 text-right">
                    <button class="btn btn-primary profile-button" type="submit">Save </button>
                </div>
            </div>
            @else
            <div class="p-3 py-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-primary">Modifier l'utilisateur</h2>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Nom et prénom</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{ $user->name }}">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Adresse Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ $user->email }}">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Contact</label>
                      <input type="text" class="form-control @error('contact') is-invalid @enderror" placeholder="Contact" name="contact" value="{{ $user->contact }}">
                      @error('contact')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Image</label>
                      <input type="file" class="form-control"  placeholder="Image de profil" name="profil_image" value="{{ $user->profil_image  }}">
                    </div>
                </div>

                <div class="row mt-1">
                     <h2 class="text-primary mt-3" >Information Agence</h2>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Nom de l'agence</label>
                      <input type="text" class="form-control @error('agence_name') is-invalid @enderror" placeholder="address"  name="agence_name" value="{{isset($agence) ? $agence->agence_name :'' }}">
                      @error('agence_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Adresse </label>
                      <input type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ $agence->adress==null ? '' : $agence->adress}}" >
                    @error('adress')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Description</label>
                      <input type="text" class="form-control @error('description') is-invalid @enderror"  name="description" value="{{ $agence->description }}">
                      @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="firstName">Logo Agence</label>
                      <input type="file" class="form-control" placeholder="Selectionnez une image" name="logo" value="{{ $agence->logo }}">
                    </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12">
                    <label class="form-label" for="firstName">Type d'agence</label>
                    <select class="form-control @error('type') is-invalid @enderror " name="type" id="typeAgence">
                      <option value="none" selected="" disabled="">Type d'agence</option>
                      @if (isset($type_agence) AND $type_agence!=null)
                          @forelse ($type_agence as $type)
                          <option value="{{$type->name}}">{{$type->name}}</option>
                          @empty
                          @endforelse
                      @endif
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="mt-5 text-right">
                    <button class="btn btn-primary profile-button" type="submit">Save </button>
                </div>
            </div>
            @endif
        </div>
    </div>
   </form>
</div>




{{-- <div class="tab-content" id="myTabContent">
                                    
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
          >
              @csrf
          <h3 class="register-heading">Compte organisateur</h3>
          <div class="row register-form">
              <div class="col-md-6">
                  <div class="form-group">
                  <input placeholder="Nom et prénom" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                  <input id="password" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              
              
                  <div class="form-group">
                  <input id="password-confirm" placeholder="Repeter le mot de passe" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                  </div>

                  
              
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <input  placeholder="Adresse E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                  <input  placeholder="Contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                      @error('contact')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              
                  <div class="form-group">
                      <input type="file" class="form-control @error('profil_image') is-invalid @enderror"  name="profil_image">
                      @error('profil_image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
          </div>

          <input name="type" value=1 id="type" type="number" hidden/>
          <h3 class="text-center text-dark mb-3">Informations agence</h3>
          <div class="row" style="padding-left: 10%;padding-right: 10%; margin-top:0px">
              <div class="col-md-6">
                  <div class="form-group">
                  <input id="agence_name" placeholder="Nom agence" type="text" class="form-control @error('agence_name') is-invalid @enderror" name="agence_name" value="{{ old('agence_name') }}"  autocomplete="agence_name">
                      @error('agence_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>


                  <div class="form-group">
                      <input id="description" placeholder="Description Agence" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description">
                      @error('agence_description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>     
              
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <input type="file" class="form-control  @error('logo') is-invalid @enderror" id="customFile" name="logo">
                      @error('logo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <input id="addresse" placeholder="Addresse" type="text" class="form-control @error('addresse') is-invalid @enderror" name="addresse" value="{{ old('addresse') }}"  autocomplete="addresse">
                      @error('addresse')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              
                  <div class="form-group">
                      <select class="form-control " name="type" id="typeAgence">
                      <option value="none" selected="" disabled="">Type d'agence</option>
                          @forelse ($types_agences as $type)
                          <option value="{{$type->name}}">{{$type->name}}</option>
                          @empty
                          @endforelse
                      </select>
                  </div>

                  <input type="submit" class="btnRegister"  value="Je m'inscrit"/>
              </div>
          </div>
      </form>
  </div>
  
  
  <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
      >
          @csrf
      <h3  class="register-heading">Compte spectateur</h3>
      <div class="row register-form">
          <div class="col-md-6">
              <div class="form-group">
              <input id="name" placeholder="Nom et prénom" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          
              
          
              <div class="form-group">
              <input  placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <input name="type" value=3 type="number" hidden/>

              <div class="form-group">
              <input placeholder="Repeter le mot de passe" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
              </div>

              
          
          </div>
          <div class="col-md-6">
              <div class="form-group">
              <input id="email" placeholder="Adresse E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="form-group">
              <input id="contact" placeholder="Contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                  @error('contact')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          
              <div class="form-group">
                  <input type="file" class="form-control @error('profil_image') is-invalid @enderror"  name="profil_image">
                  @error('profil_image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <input type="submit" class="btnRegister"  value="Je m'inscrit"/>

          </div>
      </div>
  </form>
  </div>
  
</div> --}}


@endsection
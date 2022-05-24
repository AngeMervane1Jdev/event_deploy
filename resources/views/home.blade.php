@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
<style>
.profile-pic {
  color: transparent;
  transition: all 0.3s ease;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  transition: all 0.3s ease;
}
.profile-pic input {
  display: none;
}
.profile-pic img {
  position: absolute;
  object-fit: cover;
  width: 165px;
  height: 165px;
  box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
  border-radius: 100px;
  z-index: 0;
}
.profile-pic .-label {
  cursor: pointer;
  height: 165px;
  width: 165px;
}
.profile-pic:hover .-label {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.8);
  z-index: 10000;
  color: #fafafa;
  transition: background-color 0.2s ease-in-out;
  border-radius: 100px;
  margin-bottom: 0;
}
.profile-pic span {
  display: inline-flex;
  padding: 0.2em;
  height: 2em;
}
</style>
 <!-- inner banner -->
 <div class="inner-banner " style="background: url('{{secure_asset('images/calendar.jpg')}}') no-repeat top; background-size: cover;">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Profil</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Profil</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->

<div class="blog-section py-5" >
 <div class="container py-md-5 py-4">
    <div class="">

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="cards">
                <div class="card-bodys">
                  <div class="d-flex flex-column align-items-center text-center profile-pic">
                  @if(Auth::user()->profil_image!=null)
                  <img src="{{secure_asset('profils/'.Auth::user()->profil_image)}}" width="150" class="rounded-circle">

                  @else
                       
                        <div class="profile-pic">
                          <label class="-label" for="file">
                            <span class="glyphicon glyphicon-camera"></span>
                            <span style="color: #ffffff;">Change Image</span>
                          </label>
                          <input id="file" type="file" name="file"  onchange="loadFile(event)"/>
                          <img src="{{secure_asset('images/user-admin.png')}}" id="output" width="200" />
                        </div>

                    <div class="mt-3">
                      <h4>{{Auth::user()->name}}</h4>
                      @if(Auth::user()->type_user_id==1)
                      <p class=" mb-1" style="color:#fd7e14">Organisateur</p>
                      @endif
                      @if(Auth::user()->type_user_id==2)
                      <p class=" mb-1" style="color:#fd7e14">Promoteur</p>
                      @endif
                      @if(Auth::user()->type_user_id==3)
                      <p class=" mb-1" style="color:#fd7e14">Spectateur</p>
                      @endif
                    </div>
                    <div class="star-rating ">
                            @if(Auth::user()->rate > 0)
                            <div id="{{ Auth::user()->id . '.1' }}" data-toggle="tooltip" title="1"  class="star-yellow">
                                @else
                                <div id="{{ Auth::user()->id . '.1' }}" data-toggle="tooltip" title="1" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                            @if(Auth::user()->rates > 1)
                            <div id="{{ Auth::user()->id . '.2' }}" data-toggle="tooltip" title="2"   class="star-yellow">
                            @else 
                            <div id="{{ Auth::user()->id . '.2' }}" data-toggle="tooltip" title="2" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>
                            @if(Auth::user()->rates > 2)
                            <div id="{{ Auth::user()->id . '.3' }}" data-toggle="tooltip" title="3"  class="star-yellow">
                                @else 
                            <div id="{{ Auth::user()->id . '.3' }}" data-toggle="tooltip" title="3" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                            @if(Auth::user()->rates > 3)
                            <div id="{{ Auth::user()->id . '.4' }}" data-toggle="tooltip" title="4"  class="star-yellow">
                                @else
                            <div id="{{ Auth::user()->id . '.4' }}" data-toggle="tooltip" title="4" style="color: #fafafa;" >
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>
                            @if(Auth::user()->rates > 4)
                            <div id="{{ Auth::user()->id . '.5' }}" data-toggle="tooltip" title="5"   class="star-yellow">
                                @else
                            <div id="{{ Auth::user()->id . '.5' }}" data-toggle="tooltip" title="5" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            {{RateUser(Auth::user()->id)}}
            <div class="col-md-8  ">
              <div class="cards mb-3">
                <div class="card-bodys">
            <form action="{{ route('user_profile',Auth::user()->id) }}" class="form-horizontal" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pseudo</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="pseudo" value="{{Auth::user()->pseudo }}" >
                          </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mot de passe actuel (obligatoire)</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="password" name="password">
                          </div>
                     </div>
                  </div>
                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nouveau mot de passe(facultatif)</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="password" name="new-password">
                          </div>
                     </div>
                  </div>

                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="contact" value="{{Auth::user()->contact}}">
                          </div>
                    </div>
                    @if(Auth::user()->type_user_id==3)
                    <div class="btns" >
                        <button type="submit" class="btn btn-info" style="margin-top:15px" >Enregistrer les modifications</button>
                      </div>
                      @endif
                  </div>

                @if(Auth::user()->type_user_id==1)
                <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Agence Name</h6>
                    </div>
                    <div class="col-sm-9 ">
                          <div class="col-lg-8">
                            <input class="form-control" type="text" name="agence_name" value=" {{Auth::user()->agence()->get()[0]->agence_name }}">
                          </div>
                    </div>
                  </div>

                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Description Agence</h6>
                    </div>
                    <div class="col-sm-9 ">
                          <div class="col-lg-8">
                            <input class="form-control" type="text" name="description" value=" {{Auth::user()->agence()->get()[0]->description}}">
                          </div>
                    </div>
                    <div class="btns" >
                      <button  type="submit" class="btn btn-info" style="margin-top:15px" >Enregistrer les modifications</button>
                    </div>
                  </div>
                  @endif
                </form>
                </div>
              </div>

            </div>

          </div>

        </div>
    </div>
</div>

  <script type="text/javascript">
  var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
  var profil=document.getElementById("file");
  console.log(profil.value);

  };
  </script>


<style>
.star-rating div {
    display: inline-block;
    font-size:30px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    cursor:default;
  }
  .star-yellow,
  .star-rating div:hover,
  .star-rating div:hover div{
    color: red
  }

  .hover_img a { position:relative; }
  .hover_img a span { position:absolute; display:none; z-index:99; }
  .hover_img a:hover span { display:block; }
</style>

  @endsection

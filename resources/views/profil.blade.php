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
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Profil Organisateur</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Profil Organisateur</li>
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
                  <div class="d-flex flex-column align-items-center text-center">
                  @if($user->profil_image!=null)
                  <img src="{{secure_asset('profils/'.$user->profil_image)}}" width="150" class="rounded-circle">

                  @else
                        <div class="profile-pic" style="cursor: none;">
                          <label class="-label" for="file"> </label>
                          <img src="{{secure_asset('images/user-admin.png')}}" id="output" width="200" />
                        </div>

                    <div class="mt-3">
                      <h4>{{$user->name}}</h4>
                      @if($user->type_user_id==1)
                      <p class=" mb-1" style="color:#fd7e14">Organisateur</p>
                      @endif
                      @if($user->type_user_id==2)
                      <p class=" mb-1" style="color:#fd7e14">Promoteur</p>
                      @endif
                      @if($user->type_user_id==3)
                      <p class=" mb-1" style="color:#fd7e14">Spectateur</p>
                      @endif
                    </div>
                    <div class="star-rating ">
                            @if($user->rate > 0)
                            <div id="{{ $user->id . '.1' }}" data-toggle="tooltip" title="1"  class="star-yellow">
                                @else
                                <div id="{{ $user->id . '.1' }}" data-toggle="tooltip" title="1" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                            @if($user->rates > 1)
                            <div id="{{ $user->id . '.2' }}" data-toggle="tooltip" title="2"   class="star-yellow">
                            @else 
                            <div id="{{ $user->id . '.2' }}" data-toggle="tooltip" title="2" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>
                            @if($user->rates > 2)
                            <div id="{{ $user->id . '.3' }}" data-toggle="tooltip" title="3"  class="star-yellow">
                                @else 
                            <div id="{{ $user->id . '.3' }}" data-toggle="tooltip" title="3" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                            @if($user->rates > 3)
                            <div id="{{ $user->id . '.4' }}" data-toggle="tooltip" title="4"  class="star-yellow">
                                @else
                            <div id="{{ $user->id . '.4' }}" data-toggle="tooltip" title="4" style="color: #fafafa;" >
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>
                            @if($user->rates > 4)
                            <div id="{{ $user->id . '.5' }}" data-toggle="tooltip" title="5"   class="star-yellow">
                                @else
                            <div id="{{ $user->id . '.5' }}" data-toggle="tooltip" title="5" style="color: #fafafa;">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>

            <div class="col-md-8  ">
              <div class="cards mb-3">
                <div class="card-bodys">
             <form>
                @csrf
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pseudo</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="pseudo" value="{{$user->pseudo }}" >
                          </div>
                    </div>
                  </div>
                  

                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">N° de téléphone</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="contact" value="{{$user->contact}}">
                          </div>
                    </div>
                   
                  </div>

                @if($user->type_user_id==1)
                <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Agence</h6>
                    </div>
                    <div class="col-sm-9 ">
                          <div class="col-lg-8">
                            <input class="form-control" type="text" name="agence_name" value=" {{$user->agence()->get()[0]->agence_name }}">
                          </div>
                    </div>
                  </div>

                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Description Agence</h6>
                    </div>
                    <div class="col-sm-9 ">
                          <div class="col-lg-8">
                            <input class="form-control" value=" {{$user->agence()->get()[0]->description}}">
                          </div>
                    </div>
                    {{RateUser($user->id)}}
                  </div>
                  @endif
                  <div class="btns" >
                      <a  type="submit" href="https://wa.me/{{$user->contact}}?text=Bonjour" class="btn btn-info" style="margin-top:15px" >Contacter</a>
                    </div>
                </form>
                </div>
              </div>

            </div>

          </div>

        </div>
    </div>
</div>

<script>


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

  input{
      cursor: pointer;
  }

  .hover_img a { position:relative; }
  .hover_img a span { position:absolute; display:none; z-index:99; }
  .hover_img a:hover span { display:block; }
</style>

  @endsection

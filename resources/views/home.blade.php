@extends('layouts.app')

@section('content')

 <!-- inner banner -->
 <div class="inner-banner " style="background: url('{{ secure_asset('images/in.jpg')}}') no-repeat top; background-size: cover;">
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
                  <img src="{{ secure_asset('profils/'.Auth::user()->profil_image)}}" width="150" class="rounded-circle">

                    @else
                        <img src="{{ secure_asset('images/user-admin.png')}}" id="profileImage" width="150" class="rounded-circle">
                        @endif
                        <div class="file-input">
                            <form action="" method="get">
                                <input
                                type="file"
                                name="file-input"
                                id="file-input"
                                class="file-input__input"
                              />
                            </form>

                            <label class="file-input__label" for="file-input">
                                <img src="https://img.icons8.com/material-outlined/24/fa314a/camera--v2.png"/>
                             </label >
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
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8  ">
              <div class="cards mb-3">
                <div class="card-bodys">
            <form action="" class="form-horizontal" method="GET">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="email" value="{{Auth::user()->email}}" >
                          </div>
                     </div>
                  </div>

                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="{{Auth::user()->contact}}">
                          </div>
                    </div>
                    @if(Auth::user()->type_user_id==3)
                    <div class="btns" >
                        <a href="" class="btn btn-info" style="margin-top:15px" >Enregistrer les modifications</a>
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
                            <input class="form-control" type="text" value=" {{Auth::user()->agence()->get()[0]->agence_name }}">
                          </div>

                    </div>
                  </div>

                  <div class="row" style="margin-top: 25px">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Description Agence</h6>
                    </div>
                    <div class="col-sm-9 ">
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value=" {{Auth::user()->agence()->get()[0]->description}}">
                          </div>

                    </div>
                    <div class="btns" >
                      <a href="" class="btn btn-info" style="margin-top:15px" >Enregistrer les modifications</a>
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

  @endsection

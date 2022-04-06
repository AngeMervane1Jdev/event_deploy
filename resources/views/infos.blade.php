@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/carousel.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/carousel.rlt.css') }}">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

@section('content')

    <!-- inner banner -->
    <div class="inner-banner ">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Qui Sommes-Nous?</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>QuiSommesNous</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->

    <!-- about section -->
    <div class="blog-section py-5" id="events">
        <div class="container py-md-5 py-4">
            <div class="row w3l-features-photo-7_top align-items-center">
                <div class="col-lg-6 w3l-features-photo-7_top-left pl-lg-4">
                    <div class="waviy">
                        <span style="--i:1">Q</span>
                        <span style="--i:2">u</span>
                        <span style="--i:3">i</span>
                        <span style="--i:4"> </span>
                        <span style="--i:5"></span>
                        <span style="--i:6">S</span>
                        <span style="--i:7">o</span>
                        <span style="--i:1">m</span>
                        <span style="--i:2">m</span>
                        <span style="--i:3">e</span>
                        <span style="--i:4">s</span>
                        <span style="--i:5"> </span>
                        <span style="--i:6">N</span>
                        <span style="--i:7">o</span>
                        <span style="--i:1">u</span>
                        <span style="--i:2">s</span>
                    </div>
                    <p>
                            Envie d’en savoir plus sur MASSALI EVENTS ? Nous vous en parlons !
                            Dans un monde digital en perpétuelle évolution, l’innovation est la clé première de notre
                            développement informatique et technologique !
                    </p>
                    <div class="row feat_top mt-4 pt-lg-3">
                        <div class="col-6 w3l-features-photo-7-box">
                            <img src="assets/images/a1.png" alt="" class="img-fluid">
                            <h5 class="w3l-feature-text mb-2 mt-3">Notre Mission</h5>
                            <p>
                                Accompagner nos clients dans leurs évènements ;
                                Etudier, analyser et mettre en place des solutions numériques afin de répondre aux besoins de nos clients ;
                                Former et conseiller dans les domaines de Développement Web, de Cyber Sécurité et de Réseaux.
                            </p>
                        </div>
                        <div class="col-6 w3l-features-photo-7-box">
                            <img src="assets/images/s1.png" alt="" class="img-fluid">
                            <h5 class="w3l-feature-text mb-2 mt-3">Notre Vision</h5>
                            <p>
                                MASSALI EVENTS est la première entreprise informatique par excellence dans les secteurs de Développement logiciel, de Cyber Sécurité et de Réseaux.
                                Nos services sont sollicités à travers le monde grâce à notre engagement à satisfaire nos clients.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 w3l-features-photo-7_top-right mt-lg-0 mt-sm-5 mt-4">
                    <!-- <img src="{{ secure_asset('images/Apropos.png')}}" class="img-responsive" alt="" /> -->
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                       <img src="{{ secure_asset('images/hero_1.jpg')}}" alt="" class="bd-placeholder-img" width="100%" height="100%"><rect width="100%" height="100%" fill="#777"/>
                        <div class="container">
                        <div class="carousel-caption text-start">
                            <!-- <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                        <img src="{{ secure_asset('images/hero_2.jpg')}}" alt="" class="bd-placeholder-img" width="100%" height="100%"><rect width="100%" height="100%" fill="#777"/>
                        <div class="container">
                        <div class="carousel-caption">
                            <!-- <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                        <img src="{{ secure_asset('images/hero_3.jpg')}}" alt="" class="bd-placeholder-img" width="100%" height="100%"><rect width="100%" height="100%" fill="#777"/>
                        <div class="container">
                        <div class="carousel-caption text-end">
                            <!-- <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> -->
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
                </div>
            </div>
            <!-- fireworks effect -->
            <div class="pyro">
                <div class="before"></div>
                <div class="after"></div>
            </div>
        </div>
    </section>

    <section class="w3l-covers-14 evenement position-relative">
        <div class="covers14-block py-5">
            <div class="container py-md-5 py-4">

                <h3 class="title-style text-center mb-md-5 mb-4">Nos actions plus populaires</h3>
                <div class="content-sec-11">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class=" d-flex p-sm-5 p-4">
                                <div class="service-icon mr-sm-4 mr-3">
                                    <img src="{{ secure_asset('images/s3.png')}}" alt="" class="img-fluid">
                                </div>
                                <div class="services-content">
                                    <h5><a href="services.html">Ajouter un prometeur</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna at
                                        porttitor vehicula nullam augue ipsum dolor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class=" d-flex p-sm-5 p-4">
                                <div class="service-icon mr-sm-4 mr-3">
                                    <img src="{{ secure_asset('images/s1.png')}}" alt="" class="img-fluid">
                                </div>
                                <div class="services-content">
                                    <h5><a href="services.html">Organiser un evènement</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean egestas magna at
                                        porttitor vehicula nullam augue ipsum dolor.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            </div>
        </div>
    </section>
@endsection

<script src="{{ secure_asset('js/bootstrap.bundle.min.js') }}"></script>
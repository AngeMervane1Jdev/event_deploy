@extends('layouts.app')

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
                            <img src="secure_assets/images/a1.png" alt="" class="img-fluid">
                            <h5 class="w3l-feature-text mb-2 mt-3">Notre Mission</h5>
                            <p>
                                Accompagner nos clients dans leurs évènements ;
                                Etudier, analyser et mettre en place des solutions numériques afin de répondre aux besoins de nos clients ;
                                Former et conseiller dans les domaines de Développement Web, de Cyber Sécurité et de Réseaux.
                            </p>
                        </div>
                        <div class="col-6 w3l-features-photo-7-box">
                            <img src="secure_assets/images/s1.png" alt="" class="img-fluid">
                            <h5 class="w3l-feature-text mb-2 mt-3">Notre Vision</h5>
                            <p>
                                MASSALI EVENTS est la première entreprise informatique par excellence dans les secteurs de Développement logiciel, de Cyber Sécurité et de Réseaux.
                                Nos services sont sollicités à travers le monde grâce à notre engagement à satisfaire nos clients.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 w3l-features-photo-7_top-right mt-lg-0 mt-sm-5 mt-4">
                    <img src="{{secure_asset('images/Apropos.png')}}" class="img-responsive" alt="" />
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
                                    <img src="{{secure_asset('images/s3.png')}}" alt="" class="img-fluid">
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
                                    <img src="{{secure_asset('images/s1.png')}}" alt="" class="img-fluid">
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

<!doctype html>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="//fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Sail&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ secure_asset('css/style-starter.css') }}">
</head>

<header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">

                  <!-- Logo -->
                  <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ secure_asset('images/logo.png') }}" alt="Your logo" title="Your logo" style="height:35px;" />
                </a>
                 <!-- //Logo -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                    @if (Route::has('login'))
                          @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Profile</a>
                        </li>

                        <!-- search button -->
                        <div class="search-right ml-lg-3">
                            <form action="#search" method="GET" class="search-box position-relative">
                                <div class="input-search">
                                    <input type="search" placeholder="Enter Keyword" name="search" required="required"
                                        autofocus="" class="search-popup">
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                        @else
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                               Connexion </a>
                         </li>
                       @if (Route::has('register'))
                          <li>
                           <a class="nav-link" href="{{ route('register') }}">
                               Inscription </a>
                            </li>
                        @endif

                    @endauth
                    @endif
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//header-->

    <!-- inner banner -->

    <section class="w3l-w3l-contacts-12 py-5">
        <div class="contact-top py-md-5 py-4">
            <div class="container">

                <section class="w3l-breadcrumb">
                    <div class="container">
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="/">Accueil</a></li>
                            <li class="active" style="color: black"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span> Inscription</li>
                        </ul>
                    </div>
                </section>

               <div class="container">
                <div class="waviy text-center mb-md-5 mb-4">

                    <span style="--i:9"> </span>
                    <span style="--i:10">I</span>
                    <span style="--i:1">n</span>
                    <span style="--i:2">s</span>
                    <span style="--i:3">c</span>
                    <span style="--i:4">r</span>
                    <span style="--i:5">i</span>
                    <span style="--i:6">p</span>
                    <span style="--i:7">t</span>
                    <span style="--i:8">i</span>
                    <span style="--i:9">o</span>
                    <span style="--i:10">n</span>
             <div class="btns onglets">
                  <a href="#"  id="onglet_organisateur" onclick="javascript:change_onglet('organisateur');" class="btn onglet_0 onglet ">Organisteur</a>
                    <a href="#"   class="btn  onglet_0 onglet" id="onglet_client" onclick="javascript:change_onglet('client');">Client</a>

              </div>
                </div>
                <script type="text/javascript">
        //<!--
                function change_onglet(name)
                {
                        document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
                        document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
                        document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
                        document.getElementById('contenu_onglet_'+name).style.display = 'block';
                        anc_onglet = name;
                }
        //-->




        </script>


              <div class=" contacts12-main">
                <div  class="contenu_onglet" id="contenu_onglet_organisateur">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                       <div class="top-inputs d-grid">

                                <input id="name" placeholder="Nom complet" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <input id="email" placeholder="Adresse-Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                       </div>
                    <div class="top-inputs d-grid">

                                <input id="contact" placeholder="Contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('profil_image') is-invalid @enderror" id="customFile" name="profil_image">
                                        <label class="custom-file-label" for="customFile">Votre image de profile</label>
                                    </div>
                                @error('profil_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                    <div class="top-inputs d-grid">
                                <select class="form-control " name="categories[]" >
                                <option value="none" selected="" disabled="">Choisisez une Categorie</option>
                                    @forelse ($categories as $cat)
                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <input name="type" value=1 id="type" type="number" hidden/>

                    </div>
                    <div class="top-inputs d-grid">

                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">


                        </div>
            <h1 style="margin-bottom:10px; color:white;">Aidez nous à connaitre de votre agence</h1>

                       <div class="top-inputs d-grid">

                                <input id="agence_name" placeholder="Agence name" type="text" class="form-control @error('agence_name') is-invalid @enderror" name="agence_name" value="{{ old('agence_name') }}"  autocomplete="agence_name">
                                @error('agence_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                                <input id="description" placeholder="Agence description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description">
                                @error('agence_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                       </div>
                        <div class="top-inputs d-grid">

                                <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="customFile" name="logo">
                                        <label class="custom-file-label" for="customFile">Votre logo</label>
                                    </div>
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('banner') is-invalid @enderror" id="customFile" name="banner">
                                        <label class="custom-file-label" for="customFile">Votre banner</label>
                                    </div>
                                @error('banner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Je m'inscris") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="onglet_contenu" id="contenu_onglet_client" style="display: none">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                    >
                        @csrf

                       <div class="top-inputs d-grid">

                                <input id="name" placeholder="Nom complet" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <input id="email" placeholder="Adresse-Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                       </div>
                    <div class="top-inputs d-grid">

                                <input id="contact" placeholder="Contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('profil_image') is-invalid @enderror" id="customFile" name="profil_image">
                                        <label class="custom-file-label" for="customFile">Votre image de profile</label>
                                    </div>
                                @error('profil_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                        <div class="top-inputs d-grid">

                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                                <input name="type" value=3 id="type" type="number" hidden/>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __(" Je m'inscrit") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>

               </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">

        var anc_onglet = 'organisateur';
        change_onglet(anc_onglet);

        </script>
    <!-- @if(old('type')==1)
    <script type="text/javascript">

                var anc_onglet = 'organisateur';
                change_onglet(anc_onglet);

        </script>
        @else

        <script type="text/javascript">

            var anc_onglet = 'client';
            change_onglet(anc_onglet);

    </script>
    @endif -->
    <script src="{{ secure_asset('js/index.js') }}"></script>

    <section class="w3l-footer-29-main">
        <div class="footer-29 py-5">
            <div class="container py-lg-4">
                <div class="row footer-top-29">
                    <div class="col-lg-6 col-12 footer-list-29">
                        <h2>
                            <a class="footer-logo" href="index.html">
                                Massali Events</a>
                        </h2>
                        <p class="sub-list-text mt-4 pt-lg-2">Lorem ipsum dolor sit amet enim. Etiam ullamcorper.
                            Suspendisse a pellentesque
                            dui, non
                            felis. Maecenas malesuada elit lectus felis, malesuada ultricies.</p>
                    </div>
                    <div class="col-lg-3 col-sm-6 footer-list-29 mt-lg-0 mt-sm-5 mt-4 pt-sm-0 pt-2">
                        <h6 class="footer-title-29">SUPPORT</h6>
                        <ul>
                            <li><a href="#privacy">Privacy Policy</a></li>
                            <li><a href="#terms"> Terms of Service</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                            <li><a href="#support"> Support</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 footer-contact-list mt-lg-0 mt-sm-5 mt-4 pt-sm-0 pt-2">
                        <h6 class="footer-title-29">Contact Info </h6>
                        <ul>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-map-marker mr-2"
                                    aria-hidden="true"></i>10001, 5th Avenue, USA</li>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-phone mr-2"
                                    aria-hidden="true"></i><a href="tel:+12 23456790">+12
                                    23456790</a></li>
                            <li class="d-flex align-items-center py-2"><i class="fa fa-envelope mr-2"
                                    aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //footer -->
    <!-- copyright -->
    <section class="w3l-copyright">
        <div class="container">
            <div class="row bottom-copies">
                <p class="col-lg-8 copy-footer-29">© 2022 MASSALI EVENTS. Tous droits reservés.</p>
                <div class="col-lg-4 text-right">
                    <div class="main-social-footer-29">
                        <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
                        <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                        <a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                        <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
                        <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //copyright -->

    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->

    <script src="{{ secure_asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- //common jquery plugin -->

    <!-- slider-js -->

    <script src=" {{ secure_asset('js/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('js/modernizr-2.6.2.min.js') }}"></script>

    <script src="{{ secure_asset('js/jquery.zoomslider.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#owl-demo2").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->

    <!-- theme switch js (light and dark)-->

    <script src="{{ secure_asset('js/theme-change.js') }}"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        $(document).ready(function () {
            // Now to start autoTyping just call the autoType function with the
            // class of outer div
            // The second paramter is the speed between each letter is typed.
            autoType(".type-js", 200);
        });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->

    <script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
    <!-- //bootstrap-->
    <!-- //Js scripts -->
</body>

</html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <link rel="stylesheets" href="{{ secure_asset('css/register.css')}}"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->
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

    <link rel="stylesheet" href="{{ secure_asset('css/start1.css') }}">
</head>

<header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">

                  <!-- Logo -->
                  <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ secure_asset('images/massali.png') }}" alt="Your logo" title="Your logo" style="height:35px;" />
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
            </nav>
        </div>
    </header>
    <section class="w3l-w3l-contacts-12 py-5">
        <div class="contact-top py-md-5 py-4">
            <div class="container">

                <section class="w3l-breadcrumb">
                    <div class="container">
                        <ul class="breadcrumbs-custom-path">
                            <li><a href="/" style="font-size:20px;">Accueil</a></li>
                            <li class="active" style="color: #ff5100"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span> Inscription</li>
                        </ul>
                    </div>
                </section>

               <div class="container">
                    @if (session()->has('message'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>Message! </strong>{{ session('message') }}.
                            </div>
                    @endif
                    <div class="waviy text-center mb-md-5 ">

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
                      
                    </div>

                        <div class="container register radius">
                            <div class="row">
                                <div class="col-md-3 register-left">
                                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                    <h3>Un évènement, une histoire</h3>
                                    <span style="color:#fff">Créez votre compte au près de nous. Créer où participer à des évènements inoubliables</span><br/>
                                    <br/>
                                    <a class="btn" style="background-color: #ff5100;color:#fff" href="{{route('login')}}">Se connecter</a>
                                    <br/>
                                    <br/>
                                </div>
                                <div class="col-md-9 register-right">
                                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Organisateur</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Spectacteur</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                    
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
                                                <div class="row class_row">
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                  
               </div>
            </div>
        </div>
    </section>



<script src="{{ secure_asset('js/index.js') }}"></script>

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




<style>
@media (max-width:45rem){
    .register{
    background: -webkit-linear-gradient(left, #ff5100 0%, #000);
    margin-top: 3%;
    padding: 3%;
    }

    .radius{
        border-radius: 25px ;
    }
  
    .register-left{
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-right{
        background: #f8f9fa;
    }
    .register-left img{
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite  alternate;
        animation: mover 1s infinite  alternate;
    }
    @-webkit-keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    @keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    /* .register-left p{
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    } */
 
    .btnRegister{
        border: none;
        padding: 2%;
        background: #ff5100;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }
    .register .nav-tabs{
        margin-top: 3%;
        width: 100%;
        border: none;
        background: #ff5100;
        border-radius: 1.5rem;
      
        margin-bottom: 10px;
    }
    .register .nav-tabs .nav-link{
        padding: 2%;
        height: 34px;
       
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }
    .register .nav-tabs .nav-link:hover{
        border:0px;
    }
    .register .nav-tabs .nav-link.active{

        color: #ff5100;
        border: 2px solid #ff5100;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }
    .register-heading{
       display:none;
    }
}





@media(min-width: 45rem){
    .register{
    background: -webkit-linear-gradient(left, #ff5100 0%, #000);
    margin-top: 3%;
    padding: 3%;
    }

    .radius{
        border-radius: 25px ;
    }
    .register2 {
        /* background: var(--bg-light); */
        background: url(../images/bgp2.jpg) no-repeat top;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        -ms-background-size: cover;
        z-index: 1;
    
    }
    .register-left{
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }
    .register-left input{
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }
    .register-right{
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }
    .register-left img{
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite  alternate;
        animation: mover 1s infinite  alternate;
    }
    @-webkit-keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    @keyframes mover {
        0% { transform: translateY(0); }
        100% { transform: translateY(-20px); }
    }
    .register-left p{
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }
    .register .register-form{
        padding-top: 10%;
        padding-right: 10%;
        padding-left: 10%;
        margin-top: 10%;
    }
    .btnRegister{
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #ff5100;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }
    /* .register .nav-tabs{
        margin-top: 3%;
        border: none;
        background: #ff5100;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    } */
    .nav-tabs{
        margin-top:10px;
        margin-right: 10px;
        border: none;
        background: #ff5100;
        border-radius: 1.5rem;
       display:flex;
        float: right;
    }
    .register .nav-tabs .nav-link{
        width: 100%;
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }
    .register .nav-tabs .nav-link:hover{
        border: none;
    }
    .register .nav-tabs .nav-link.active{
        width: 110px;
        color: #ff5100;
        border: 2px solid #ff5100;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }
    .register-heading{
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }
    .class_row{
        padding-left: 10%;padding-right: 10%; margin-top:0px
    }
}
</style>
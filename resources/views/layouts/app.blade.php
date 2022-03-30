<!doctype html>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Massali') }}</title>

    <link href="//fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Sail&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ secure_asset('css/style-starter.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('css/font-awesome.min.css') }}">



</head>

<body>
    <!--header-->
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

                        
                       @if(Request::path()=="/")
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('register') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-toggle="modal" data-target="#modal1" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('infos') }}">Qui-Sommes Nous?</a>
                        </li>


                        @endif

                        @auth
                        @if(Auth::user()->type_user_id==1)
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Evènement
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('new_event')}}">Creer un Evènement</a>
                                <a class="dropdown-item" href="{{ route('events') }}">Les évènements disponible</a>
                                <a class="dropdown-item" href="{{route('organizer_dashboard')}}">Tableau de bord</a>
                                </div>
                        </li>
                        @endif

                        @if(Auth::user()->type_user_id==2)
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Evènement
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('new_event')}}">Créer un Evènement</a>
                                <a class="dropdown-item" href="{{ route('events') }}">Les évènements disponible</a>
                                <a class="dropdown-item" href="{{route('promotor_dashboard')}}">Tableau de bord</a>
                                </div>
                        </li>
                        @endif

                        @if(Auth::user()->type_user_id==3)
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Evènement
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('events') }}">Les évènements disponible</a>
                                <a class="dropdown-item" href="{{route('client_dashboard')}}">Tableau de bord</a>
                                <a class="dropdown-item" href="{{route('client_panier')}}">Panier</a>
                                </div>
                        </li>
                        @endif


                     <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon compte
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                              <a class="dropdown-item" href="{{ url('/home') }}" style="color:#ffffff;">{{ Auth::user()->name }}</a>
                                <div>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Deconnecter') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                 </div>
                            </div>
                     </li>
                     @if(Request::path()=="/")
                        <!-- search button -->
                        <div class="search-right ml-lg-3">
                            <form action="{{ route('search_event') }}" method="GET" class="search-box position-relative">
                                <div class="input-search">
                                    <input type="search" placeholder="Rechercher un évènement" name="q" required="required"
                                        autofocus="" class="search-popup" >
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- //search button -->
                        @endif

                        @else
                        <!-- search button -->
                        <div class="search-right ml-lg-3">
                            <form action="{{ route('search_event') }}" method="GET" class="search-box position-relative">
                                <div class="input-search">
                                    <input type="search" placeholder="Rechercher un évènement" name="q" required="required"
                                        autofocus="" class="search-popup" >
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- //search button -->

                        <li class="nav-item">
                        <a class="nav-link" style="background-color: #ffc107; padding-left: 8px; padding-right:8px; border-radius:6px"  href="{{ route('login') }}">
                               Connexion </a>
                         </li>

                       @if (Route::has('register'))
                          <li>
                           <a class="nav-link" style="background-color: #ffc107; padding-left: 8px; padding-right:8px; border-radius:6px"  href="{{ route('register') }}">
                               Inscription </a>
                            </li>
                        @endif

                    @endauth
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


			@yield('content')

     @if(Request::path()=="/")
            @include('layouts.footer.footer')
     @endif

            @include('layouts.footer.copyright')

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


    {{-- <script type="text/javascript">
        $('body').on('keyup','#search-form', function(){
            const searchQword=$(this).val();

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                method: 'POST',
                url: '{{ route("search_achat") }}',
                dataType: 'json',
                data: {
                     searchQword:searchQword
                },
                success:function(response){
                    
                   var tableRow='';
                   $('#transactions').html('');
                   
                   $.each(response,function(index,trs){
                    tableRow='<tr><td>'+index+'</td><td>'+

                        trs.event_name+'</td><td>'+trs.type_id+'</td><td>'
                         trs.price +'FCFA'+'</td><td>'+
                        event_status(trs.event_id)+'</td><td>'+
                            trs.created_at +'</td></tr>';
                            $('#transactions').append(tableRow);
                   });

                   
                   
                }
            });
        });
     </script>  --}}
</body>


</html>

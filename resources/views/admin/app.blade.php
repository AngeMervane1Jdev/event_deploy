<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    -->
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Admin</title>

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

        <!-- google fonts -->
        <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    </head>

    <body class="sidebar-menu-collapsed">
        <div class="se-pre-con"></div>
        <section>
            <!-- sidebar menu start -->
            <div class="sidebar-menu sticky-sidebar-menu">

                <!-- logo start -->
                <div class="logo">
                    <h1><a href="index.html">Collective</a></h1>
                </div>

                <!-- if logo is image enable this -->
                <!-- image logo --
        <div class="logo">
          <a href="index.html">
            <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
          </a>
        </div>
        <-- //image logo -->

                <div class="logo-icon text-center">
                    <a href="{{ route('admin') }}" title="logo"><img src="{{secure_asset('/images/logo1.png')}}" alt="logo-icon"> </a>
                </div>
                <!-- //logo end -->

                <div class="sidebar-menu-inner">

                    <!-- sidebar nav start -->
                    <ul class="nav nav-pills nav-stacked custom-nav">
                        <li class="active"><a href="{{ route('admin_home') }}"><i class="fa fa-tachometer"></i><span style="font-size: 12px"> Dashboard</span></a>
                        </li>
                        <li><a href="{{ route('admin_listEvents') }}"><i class="fa fa-table"></i> <span style="font-size: 12px">Liste des évènements</span></a></li>
                        <li><a href="{{ route('admin_listTicket') }}"><i class="fa fa-table"></i> <span style="font-size: 12px">Liste des tickets  évènements</span></a></li>
                        <li><a href="{{ route('admin_listOrganize') }}"><i class="fa fa-th"></i> <span style="font-size: 12px">Liste des organisateurs</span></a></li>
                        <li><a href="{{ route('admin_login') }}"><i class="fa fa-file-text"></i> <span style="font-size: 12px">Modifier Compte</span></a></li>
                    </ul>
                    <!-- //sidebar nav end -->
                    <!-- toggle button start -->
                    <a class="toggle-btn">
                        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
                        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
                    </a>
                    <!-- //toggle button end -->
                </div>
            </div>
            <!-- //sidebar menu end -->
            <!-- header-starts -->
            <div class="header sticky-header">

                <!-- notification menu start -->
                <div class="menu-right">
                    <div class="navbar user-panel-top">
                        <div class="search-box">
                            <form action="#search-results.html" method="get">
                                <input class="search-input" placeholder="Search Here..." type="search" id="search">
                                <button class="search-submit" value=""><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <div class="user-dropdown-details d-flex">

                            <div class="profile_details">
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true" aria-expanded="false">
                                            <div class="profile_img">
                                                @if(Auth::user()->prfil_image!=null)
                                                <img src="{{secure_asset('profils/'.Auth::user()->profil_image)}}" width="150" class="rounded-circle">

                                                @else
                                                <img src="{{secure_asset('images/defaults/profil.png')}}" id="profileImage" width="50" class="rounded-circle">


                                                @endif
                                                <div class="user-active">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                                            <li class="user-info">
                                                <h5 class="user-name">{{Auth::user()->name}}</h5>
                                                <span class="status ml-2">Administrateur</span>
                                            </li>
                                            <li> <a href="#"><i class="lnr lnr-user"></i>Mon Profile</a> </li>
                                            <li> <a href="#"><i class="lnr lnr-cog"></i>Paramètre</a> </li>
                                            <li class="logout"> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Deconnecter</a> </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--notification menu end -->
            </div>
            <!-- //header-ends -->
            <!-- main content start -->
            <div class="main-content">

                <!-- content -->
                <div class="container-fluid content-top-gap">

                    @if(Request::path()=="Admin")
                    <div style="text-align: center">
                        <h1>Bienvenue sur la page administrateur</h1>
                    <img src="{{secure_asset('images/logo.png')}}" alt="">
                    </div>
                    <a href="{{ route('admin_login') }}" class="btn btn-primary btn-style mt-4" style="text-align: center" type="submit" >Connecter vous</a>
                    @endif

                    @yield('content')

                </div>
                <!-- //content -->
            </div>
            <!-- main content end-->
        </section>
        <!--footer section start-->
        <footer class="dashboard">
            <p>&copy 2022. All Rights Reserved |MASSALI EVENTS.</a></p>
        </footer>
        <!--footer section end-->
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
      <span class="fa fa-angle-up"></span>
    </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
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
        <!-- /move top -->


        <script src=" {{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src=" {{ asset('js/jquery-1.10.2.min.js') }}"></script>

        <!-- chart js -->
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/utils.js') }}"></script>
        <!-- //chart js -->




        <script src=" {{ asset('js/jquery.nicescroll.js') }}"></script>
        <script src=" {{ asset('js/scripts.js')}}"></script>


        <script>
            var closebtns = document.getElementsByClassName("close-grid");
            var i;

            for (i = 0; i < closebtns.length; i++) {
                closebtns[i].addEventListener("click", function() {
                    this.parentElement.style.display = 'none';
                });
            }
        </script>


        <!-- disable body scroll when navbar is in active -->
        <script>
            $(function() {
                $('.sidebar-menu-collapsed').click(function() {
                    $('body').toggleClass('noscroll');
                })
            });
        </script>
        <!-- disable body scroll when navbar is in active -->

        <!-- loading-gif Js -->
        <script src="{{ asset('js/modernizr.js') }}"></script>
        <script>
            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
        </script>
        <!--// loading-gif Js -->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    </body>

    </html>

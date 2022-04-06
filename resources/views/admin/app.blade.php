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
        <link rel="stylesheet" href="{{ secure_asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <!-- google fonts -->
        <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ secure_asset('css/style-starter.css') }}">
        @yield('style')
    </head>

    <body class="sidebar-menu-collapsed">
        <div class="se-pre-con"></div>
        <section>
            <!-- sidebar menu start -->
            <div class="sidebar-menu sticky-sidebar-menu">

                <!-- logo start -->
                <div class="logo">
                    <h1><a href="/Admin">Collective</a></h1>
                </div>

   

                <div class="logo-icon text-center">
                    <a href="{{ route('admin') }}" title="logo"><img src="{{ secure_asset('/images/logo1.png')}}" alt="logo-icon"> </a>
                </div>
                <!-- //logo end -->

                <div class="sidebar-menu-inner">

                    <!-- sidebar nav start -->
                    <ul class="nav nav-pills nav-stacked custom-nav">
                        <li class="{{request()->is('Admin/home') ? 'active':''}}"><a href="{{ route('admin_home') }}"><i class="fa fa-tachometer"></i><span style="font-size: 12px"> Dashboard</span></a>
                        </li>
                    
                        <li class="{{request()->is('Admin/listevents') ? 'active':''}}"><a href="{{ route('admin_listEvents') }}"><i class="fa fa-list-ol"></i> <span style="font-size: 12px">Liste des évènements</span></a></li>
                        <li class="{{request()->is('Admin/listOrganize') ? 'active':''}}"><a href="{{ route('admin_listOrganize') }}"><i class="fa fa-users"></i> <span style="font-size: 12px">Liste des organisateurs</span></a></li>
                        <li class="{{request()->is('Admin/listOrganize') ? 'active':''}}"><a href="{{ route('admin_listOrganize') }}"><i class="fa fa-bar-chart"></i> <span style="font-size: 12px">Statistiques</span></a></li>
                        <li class="{{request()->is('Admin/login') ? 'active':''}}"><a href="{{ route('admin_login') }}"><i class="fa fa-edit"></i> <span style="font-size: 12px">Modifier Compte</span></a></li>

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
            <div class="py-3 mb-3 ">
                <div class="container-fluid d-flex justify-content-md-between d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
                <div class="dropdown">
                </div>
                <div class="d-flex align-items-center">
                @if(!Route::is('admin_home') && !Route::is('admin_login') && !Route::is('admin'))
                    <form class="w-100 me-3 d-flex align-items-center">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg></i>
                        </button>
                        </div>
                    </div>
                    </form>
                    @endif
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ secure_asset('images/user-admin.png')}}" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>

                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li class="user-info dropdown-item">
                                <h5 class="user-name">{{Auth::user()->name}}</h5>
                                <span class="status ml-2">Administrateur</span>
                            </li>
                            <li class="dropdown-item"> <a href="{{route('admin_profile')}}"><i class="lnr lnr-user" style="margin-right:15px"></i>Mon Profile</a> </li>
                            <li class="dropdown-item"> <a href="#"><i class="lnr lnr-cog" style="margin-right:15px"></i>Paramètre</a> </li>
                            <li class="logout dropdown-item"> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Deconnecter</a> </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                                   
                    </div>
                </div>
                </div>
            </div>

              
            </div>
            <!-- //header-ends -->
            <!-- main content start -->
            <div class="main-content">

                <!-- content -->
                <div class="container-fluid content-top-gap">

                    @if(Request::path()=="Admin")
                    <div style="text-align: center">
                        <h1>Bienvenue sur la page administrateur</h1>
                    <br><br>
                    </div>
                    <div style="text-align: center">
                         <img src="{{ secure_asset('images/logo.png')}}" alt=""> 
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
            <!-- <p>&copy 2022. All Rights Reserved |MASSALI EVENTS.</a></p> -->
            @include('layouts.footer.copyright')
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


        <script src=" {{ secure_asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src=" {{ secure_asset('js/jquery-1.10.2.min.js') }}"></script>

        <!-- chart js -->
        <script src="{{ secure_asset('js/Chart.min.js') }}"></script>
        <script src="{{ secure_asset('js/utils.js') }}"></script>
        <!-- //chart js -->




        <script src=" {{ secure_asset('js/jquery.nicescroll.js') }}"></script>
        <script src=" {{ secure_asset('js/scripts.js')}}"></script>


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
        <script src="{{ secure_asset('js/modernizr.js') }}"></script>
        <script>
            $(window).load(function() {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
        </script>
        <!--// loading-gif Js -->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ secure_asset('js/bootstrap.bundle.min.js') }}"></script>

    </body>

    </html>

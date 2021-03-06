@extends('admin.app')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="/Admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
<div class="welcome-msg pt-3 pb-4">
    <h1>Salut <span class="text-primary">{{Auth::user()->name}}</span>, Soyez la bienvenue</h1>

</div>

<!-- statistics data -->
<div class="statistics">
    <!-- style="margin-right:15px" -->
    <div class="row">
        <div class="col-xl-6 pr-xl-2">
            <div class="row">
                <div class="col-sm-6 pr-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="lnr lnr-users"> </i>
                        <h3 class="text-primary number">{{$users}}</h3>
                        <p class="stat-text">Total utilisateurs</p>
                    </div>
                </div>
                <div class="col-sm-6 pl-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="lnr lnr-cart"> </i>
                        <h3 class="text-secondary number">{{$trs}}</h3>
                        <p class="stat-text">Total transactions</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 pl-xl-2">
            <div class="row">
                <div class="col-sm-6 pr-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="lnr lnr-star"> </i>
                        <h3 class="text-success number">{{$tickets}}</h3>
                        <p class="stat-text">Total tickets</p>
                    </div>
                </div>
                <div class="col-sm-6 pl-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="lnr lnr-store"> </i>
                        <h3 class="text-danger number">{{$amount}}</h3>
                        <p class="stat-text">Prix total de transactions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //statistics data -->


<!-- accordions -->
<div class="accordions">
    <div class="row">
        <!-- accordion style 1 -->
        <div class="col-lg-12 mb-4">
            <div class="card card_border">
                <div class="card-header chart-grid__header">
                    Bootstrap Accordions
                </div>
                <div class="card-body1">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header bg-white p-0" id="headingOne">
                                <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Collapsed accordion heading </a>
                            </div>

                            <!-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body para__style">
                                    Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis. Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                                    ex. Maecenas pharetra pulvinar tincidunt.
                                </div>
                            </div> -->
                        </div>
                        <div class="card">
                            <div class="card-header bg-white p-0" id="headingTwo">
                                <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Click here to collapse accordion</a>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body para__style">
                                    Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis. Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                                    ex. Maecenas pharetra pulvinar tincidunt.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-white p-0" id="headingThree">
                                <a href="#" class="card__title p-3" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Click here to
      collapse accordion</a>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body para__style">
                                    Nulla tincidunt quam justo, in tincidunt tortor sollicitudin a. Donec porta posuere libero sed varius. Phasellus hendrerit commodo sem, at sagittis sapien semper quis. Etiam vitae facilisis nibh. Maecenas erat nisl, blandit at nunc a, lobortis sagittis
                                    ex. Maecenas pharetra pulvinar tincidunt.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //accordion style 1 -->
    </div>
</div>
<!-- //accordions -->


                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //modals -->
@endsection

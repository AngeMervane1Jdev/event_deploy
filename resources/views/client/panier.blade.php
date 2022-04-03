@extends('layouts.app')

@section('content')


<!-- inner banner -->
<div class="inner-banner "
    style="background: url('{{secure_asset('images/inner4.jpg')}}') no-repeat top; background-size: cover;">

    <section class="w3l-breadcrumb">
        <div class="container py-md-5 py-4">
            <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Panier</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Accueil</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Panier</li>
            </ul>
        </div>
    </section>
</div>
<!-- //inner banner -->

<div class="blog-section py-5" id="events">
    <div class="container py-md-5 py-4">

        <!-- Payement éffectuer avec succès -->

        @if (session()->has('message') && session('message')!=1)

        <a href="#modalOpen" id="modalContentin" class=" is-primary"></a>

        <div class="modal" id="modalOpen">
            <div class="modal-background"></div> <!-- Overlay arrière-plan -->
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title"></p>
                    <!-- Bouton de fermeture -->
                    <a href="#" id="modalContentout" title="Fermer la fenêtre">
                        <i class="fas fa-times btn_close"></i> <!-- Icône font awesome -->
                    </a>
                </header>

                <section class="modal-card-body row h-50 justify-content-center align-items-center">

                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Message! </strong>{{ session('message') }}.
                    </div>
                </section>

                <footer class="modal-card-foot">
                    <a href="" class=" is-primary"></a> <!-- Bouton optionnel -->
                </footer>
            </div>
        </div>

        <!-- cocher un ticket -->

        @elseif (session()->has('message') && session('message')==1)

        <a href="#modalOpen" id="modalContentin" class=" is-primary"></a>

        <div class="modal" id="modalOpen">
            <div class="modal-background"></div> <!-- Overlay arrière-plan -->
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title"></p>
                    <!-- Bouton de fermeture -->
                    <a href="#" id="modalContentout" title="Fermer la fenêtre">
                        <i class="fas fa-times btn_close"></i> <!-- Icône font awesome -->
                    </a>
                </header>

                <section class="modal-card-body row h-50 justify-content-center align-items-center">

                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Message! Veuillez cocher au moins un ticket </strong>
                    </div>
                </section>

                <footer class="modal-card-foot">
                    <a href="" class=" is-primary"></a> <!-- Bouton optionnel -->
                </footer>
            </div>
        </div>
        @endif
        <div class="waviy text-center mb-md-5 mb-4">
            <span style="--i:1">M</span>
            <span style="--i:2">o</span>
            <span style="--i:3">n</span>
            <span style="--i:4"> </span>
            <span style="--i:5">P</span>
            <span style="--i:6">a</span>
            <span style="--i:7">n</span>
            <span style="--i:8">i</span>
            <span style="--i:9">e</span>
            <span style="--i:10">r</span>


        </div>


        <div class="container">
            <link rel="stylesheet" href="{{secure_asset('css/table.css')}}">
            @if ($tickets!=null)
            <div class="seach_events">
                <div class="input-group ">
                    <input type="text" class="form-control " placeholder="Rechercher une transaction" name="q"
                        id="search-form" onkeyup="myFunction()">
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-wrap">
                            <table class="container table-dark">
                                <thead>
                                    <tr>
                                        <th>Selection</th>
                                        <th>Produit</th>
                                        <th>Prix unitaire</th>
                                        <th style="height:72.5px;margin-top:35px">Quantité</th>
                                        <th>Prix total</th>

                                        <th>Retirer</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <!-- Item1-Starts-Here -->
                                    <!-- Initialisation du total général à 0 -->
                                    @php $total = 0 @endphp



                                    <!-- On parcourt les produits du panier en session : session('basket') -->
                                    @foreach ($tickets as $ticket)

                                    <!-- On incrémente le total général par le total de chaque produit du panier -->
                                    @php $quantity=$quantities[$loop->iteration-1]; @endphp
                                    @php $total += $ticket->price*$quantity @endphp


                                    <tr class="alert" role="alert">

                                        {{-- td du checkbox --}}

                                        <td>
                                            <label class="checkbox-wrap checkbox-primary">

                                                @if(in_array($ticket->id,$tickets_validated))
                                                <input type="checkbox" checked value="{{  $ticket->id  }}" onclick="
                                                        var id=parseInt('{{$ticket->id}}');
                                                        var price=parseInt('{{$ticket->price}}');
                                                        this.checked ? selected(parseInt(id),price,1) : selected(parseInt(id),price,-1);
                                                ">
                                                @else

                                                <input type="checkbox" value="{{  $ticket->id  }}" onclick="
                                                        var id=parseInt('{{$ticket->id}}');
                                                        var price=parseInt('{{$ticket->price}}');
                                                        this.checked ? selected(parseInt(id),price,1) : selected(parseInt(id),price,-1);
                                                ">

                                                @endif
                                                <span class="checkmark"></span>
                                            </label>

                                        </td>

                                        </td>


                                        <td>
                                            <div class="">
                                                <span><a style="color: black;font-weight:bold"
                                                        href="{{ route('show_event',$ticket->event()->get()[0]->id) }}"
                                                        title="Afficher le produit"
                                                        class="mt-5 title_event">{{ $ticket->event()->get()[0]->event_name }}</a>
                                                </span>

                                            </div>
                                        </td>
                                        <td><span id='price{{$ticket->id}}'>{{ $ticket->price }}</span> XOF</td>
                                        <td>
                                            <select class="form-control" id="select{{$ticket->id}}" onchange="
                                                    
                                                    var id=parseInt('{{$ticket->id}}');
                                                    var price=parseInt('{{$ticket->price}}');
                                                    var quantity=parseInt($('#select{{$ticket->id}} option:selected').text());
                                          

                                                     $('#price_total').text(parseInt($('#price_total').text())+ price*quantity- parseInt($('#total_price'+id).text()));

                                                     $('#total_price'+id).text(price*quantity);
                                                      quantityChange(id,quantity);
                                                    
                                                    
                                                    ">
                                                <option>{{$quantity}}</option>
                                                @for($i=1;$i<=10;$i++) @if($i!=$quantity) <option>{{$i}}</option>
                                                    @endif
                                                    @endfor
                                            </select>

                                        </td>
                                        <td><span id="total_price{{$ticket->id}}">{{$ticket->price*$quantity}} </span>
                                            XOF</td>
                                        <td>
                                            <span aria-hidden="true"> <a class="btn btn-danger btn-sm"
                                                    data-confirm="vous estes sur" rel='nofollow' data-method="delete"
                                                    href="{{route('remove_ticket__from_panier',$ticket->id)}}"><i
                                                        class="fa fa-trash-o"></i></a></i></span>

                                        </td>
                                    </tr>

                                    @endforeach
                                    <tr>
                                        <td style="color: black">Tout Selectionner</td>
                                        <td>
                                            <label class="checkbox-wrap checkbox-primary">
                                                <input type="checkbox" id="select_all" onclick="
                                             var checkboxes =$('table input:checkbox');
                                            checkboxes.prop('checked', $(this).is(':checked'));
                                            $(this).is(':checked')? select_all():deselect_all();
                                            ">
                                                <span class="checkmark"></span>
                                            </label>

                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr style="background: black">
                                        <td style="color: white;font-weight:bold;" class="panier_total_price">Total
                                            général: </td>
                                        <td>
                                            <!-- On affiche total général -->
                                            <strong id="price_total">{{ $total }} </strong><strong> XOF</strong>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>

                                    <tr style="background: black">
                                        <td style="color: white;font-weight:bold;" class="panier_total_price">Total à
                                            payer:</td>
                                        <td>
                                            <!-- On affiche total général -->
                                            <strong id="priceB">{{ $price }} </strong><strong> XOF</strong>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <div style="margin-top: 15px">
                <!-- Lien pour vider le panier -->
                <p style="display: inline-block; text-align:center">
                    <a class="btn btn-danger vider m-2" href="#" data-toggle="modal" data-target="#modal2"
                        title="Retirer tous les produits du panier">Vider le panier</a>
                <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-popup">
                            <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>

                            <form method="POST" action="" class="popup-form">
                                @csrf
                                <p style="color:black">Voullez-vous vider le panier?</p>
                                <a class="btn" href="{{ route('delete_all_from_panier',$id) }}"
                                    style="background-color: red; color:white"
                                    title="Retirer tous les produits du panier">Oui</a>

                                <a class="btn" href="" style="background-color: red; color:white"
                                    title="Retirer tous les produits du panier">Non</a>
                            </form>
                        </div>
                    </div>
                </div>
                <a class="btn btn-success acheter" href="{{ route('paid_all_from_panier',$id) }}"
                    title="Passer au paiement">Faire le paiement</a>
                </p>
            </div>

            @else
            <div class="alert alert-info">Aucun produit au panier</div>
            @endif
        </div>


    </div>





</div>





<script>
function myFunction() {
    var input1, filter, table, tr, td, i, txtValue;
    const input = document.getElementById('search-form');
    filter = input.value.toUpperCase();
    table = $('#myTable');

    console.log(table.length)
    tr = $('tr');
    console.log(tr);
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementByName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function quantityChange(id, quantity) {
    var url = '/panier/ticket/quantity';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'GET',
        url: url,
        data: {
            'id': id,
            'quantity': quantity
        },
        dataType: 'json',
        success: function(response) {
            console.log(response);
            $("#priceB").text(response.price);
        },
        error: function(response) {
            console.log(response);
        }

    });

}

function deselect_all() {

    var url = "/panier/ticket/deselect-all";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'GET',
        url: url,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            document.getElementById("priceB").innerHTML = 0;
        },
        error: function(response) {
            console.log(response);
        }


    });
}


function select_all() {
    var url = "/panier/ticket/select-all";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'GET',
        url: url,
        data: {
            "check": false
        },
        dataType: 'json',
        success: function(response) {
            console.log("ok");
            console.log(response);
            document.getElementById("priceB").innerHTML = response.price;
        },
        error: function(response) {}


    });
}

function selected(id, price, type) {

    var url = "/ticket/selected";
    if (type == -1)
        var url = "/ticket/deselected";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: 'GET',
        url: url,
        data: {
            'id': id,
            "price": price
        },
        dataType: 'json',
        success: function(response) {
            document.getElementById("priceB").innerHTML = response.price;
        },
        error: function(response) {
            console.log(response);
        }


    });
}
</script>


</script>
</div>


<style>
@media(max-width:45rem) {
    .panier_total_price {
        font-size: 15px;
        display: inline-block
    }

    select {
        width: 30px;
        margin: 0px;
        padding: 0px;
        margin-top: 8px;
    }

    .acheter .vider {
        display: inline-block;
        font-size: 15px;


    }
}

@media(min-width:45rem) {
    .panier_total_price {
        font-size: 25px;
    }
}

td {
    min-width: 100px;
}
</style>
@endsection
@extends('layouts.app')

@section('content')

 <!-- inner banner -->
 <div class="inner-banner ">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">{{ Auth::user()->name }}</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Ticket</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->

    <div class="blog-section py-5" id="events">
        <div class="container py-md-5 py-4">
        @if (session()->has('message'))
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Message! </strong>{{ session('message') }}.
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
                <span style="--i:1">e</span>
                <span style="--i:8">r</span>


            </div>

            <div class="">
                @if ($tickets!=null)
                <div class="seach_events" >
                    <div class="input-group ">
                        <input type="text" class="form-control " placeholder="Rechercher une transaction" name="q" id="search-form" onkeyup="myFunction()" >
                    </div>
                </div>
               <div class="mt-5 panier">
                <link rel="stylesheet" href="{{ asset('css/panier.css') }}">
                    <!-- Mainbar-Starts-Here -->
                <div class="main-bar">
                    <div class="product">
                        <h3>Produit</h3>
                    </div>
                    <div class="quantity">
                        <h3>Prix</h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- //Mainbar-Ends-Here -->

                <!-- Items-Starts-Here -->
                <div class="items">

                    <!-- Item1-Starts-Here -->
                                 <!-- Initialisation du total général à 0 -->
                                 @php $total = 0 @endphp

                                 <!-- On parcourt les produits du panier en session : session('basket') -->
                                 @foreach ($tickets as $ticket)

                                     <!-- On incrémente le total général par le total de chaque produit du panier -->
                                     @php $total += $ticket->price @endphp
                    <div class="item1">
                        <div class="close1">
                            <!-- Remove-Item --><div class="alert-close1">  </div><!-- //Remove-Item -->
                            <div class="image1">
                                <p>{{ $loop->iteration }}</p>
                            </div>
                            <div class="title1">
                             <h3 ><a href="{{ route('show_event',$ticket->event()->get()[0]->id) }}" title="Afficher le produit" class="mt-5">{{ $ticket->event()->get()[0]->event_name }}</a></h3>

                            </div>
                            <div class="quantity1">
                                <p>XOF{{ $ticket->price }}</p>
                            </div>
                            <div class="price1">
                                <a href="{{ route('remove_ticket__from_panier',$ticket->id) }}" class="btn btn-danger btn-sm"  ><i class="fa fa-trash-o"></i></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    @endforeach
                    <!-- //Item1-Ends-Here -->

                </div>
                <!-- //Items-Ends-Here -->

                <!-- Total-Price-Starts-Here -->
                <div class="total">
                    <div class="total1" style="color: white">Total Price</div>
                    <div class="total2" style="color:white">{{ $total }}F</div>
                    <div class="clear"></div>
                </div>
                <!-- //Total-Price-Ends-Here -->

                <!-- Checkout-Starts-Here -->
                <div class="checkout">
                    <div class="add">
                        <a class="btn btn-danger"  href="{{ route('delete_all_from_panier',$id) }}" title="Retirer tous les produits du panier" >Vider le panier</a>

                    </div>
                    <div class="checkout-btn">
                        <a href="{{ route('paid_all_from_panier',$id) }}" class="btn btn-sucess" style="background-color: green">Faire le paiement <i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- //Checkout-Ends-Here -->
               </div>
                @else
                 <div class="alert alert-info">Aucun produit au panier</div>
                @endif
            </div>
                {{-- @if ($tickets!=null)
                <div class="table-responsive shadow mb-3">
                    <table class="table table-bordered table-hover bg-white mb-0">
                        <thead class="thead-dark" >
                            <tr>
                                <th>#</th>
                                <th>Evenement</th>
                                <th>Prix</th>
                                <th>Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Initialisation du total général à 0 -->
                            @php $total = 0 @endphp

                            <!-- On parcourt les produits du panier en session : session('basket') -->
                            @foreach ($tickets as $ticket)

                                <!-- On incrémente le total général par le total de chaque produit du panier -->
                                @php $total += $ticket->price @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong><a href="{{ route('show_event',$ticket->event()->get()[0]->id) }}" title="Afficher le produit" >{{ $ticket->event()->get()[0]->event_name }}</a></strong>
                                    </td>
                                    <td>{{ $ticket->price }} $</td>
                                    <td>
                                        <!-- Le Lien pour retirer un produit du panier -->
                                        <a href="{{ route('remove_ticket__from_panier',$ticket->id) }}" class="btn btn-outline-danger" title="Retirer le produit du panier" >Retirer</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr colspan="2" >
                                <td colspan="4" >Total général</td>
                                <td colspan="2">
                                    <!-- On affiche total général -->
                                    <strong>{{ $total }} $</strong>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <!-- Lien pour vider le panier -->
                <a class="btn btn-danger" href="{{ route('delete_all_from_panier',$id) }}" title="Retirer tous les produits du panier" >Vider le panier</a>
                <a class="btn btn-success" href="{{ route('paid_all_from_panier',$id) }}" title="Passer au paiement" >Faire le paiement</a>

                @else
                <div class="alert alert-info">Aucun produit au panier</div>
                @endif --}}

            </div>

        </div>
    </div>


    <script>
        // const query=document.getElementById('search-form');
        // query.addEventListener('click', function(e){
        //     alert("salut")
        // })

    function myFunction() {
      var input1, filter, table, tr, td, i, txtValue;
      const input=document.getElementById('search-form');
      filter = input.value.toUpperCase();
      table = document.getElementById('cart');
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
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
     </script>
@endsection


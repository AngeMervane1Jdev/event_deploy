@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{secure_asset('css/tables.css') }}">

<!-- inner banner -->
<div class="inner-banner " style="background: url('{{secure_asset('images/in.jpg')}}') no-repeat top; background-size: cover;">
    <section class="w3l-breadcrumb">
        <div class="container py-md-5 py-4">
            <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Client</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Accueil</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Tableau de bord</li>
            </ul>
        </div>
    </section>
</div>
<!-- //inner banner -->

<div class="blog-section py-5" id="events">
    <div class=" py-md-5 py-4">


        @if (session()->has('message'))
        
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

        @endif
        <div class="waviy text-center mb-md-5 mb-4">
            <span style="--i:1">T</span>
            <span style="--i:2">a</span>
            <span style="--i:3">b</span>
            <span style="--i:4">l</span>
            <span style="--i:5">e</span>
            <span style="--i:6">a</span>
            <span style="--i:7">u</span>
            <span style="--i:8"> </span>
            <span style="--i:8"> </span>
            <span style="--i:1">d</span>
            <span style="--i:8">e</span>
            <span style="--i:3"></span>
            <span style="--i:8"> </span>
            <span style="--i:2">b</span>
            <span style="--i:3">o</span>
            <span style="--i:4">r</span>
            <span style="--i:5">d</span>
            <span style="--i:3"></span>
            <span style="--i:8"> </span>

        </div>



        @if(count($transactions)>0)
        <div class="seach_events">

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rechercher une transaction" name="q"
                    id="search-form" onkeyup="myFunction()">
            </div>
        </div>


        <div class="outer-wrapper">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <th>N°</th>
                        <th>Evènement</th>
                        <th>Type de Ticket</th>
                        <th>Prix ticket</th>
                        <th>Statut evenemnt</th>
                        <th>Date d'achat du ticket</th>
                        <th>Status transaction</th>

                    </thead>
                    <tbody>
                        @php $index=0 @endphp
                        @forelse($transactions as $trs)

                        @foreach(json_decode($trs->ticket_id,true) as $quantity => $id)
                        <tr>
                            <td>{{ ++$index}}</td>
                            @php $e_and_t =event_and_tiket($id) @endphp
                            <td> {{ array_key_first($e_and_t) }}
                                @php $ticket=$e_and_t[array_key_first($e_and_t)] @endphp</td>
                            <td> @if($ticket->type_id==1)
                                {{__("VIP")}}
                                @elseif($ticket->type_id==2)
                                {{ __("RESERVATION")}}
                                @else($ticket->type_id==3)
                                {{__("SIMPLE")}}
                                @endif</td>
                            <td>{{ $ticket->price }} FCFA</td>
                            <td>{{event_status($ticket->event_id) }}</td>
                            <td>{{ $trs->created_at }}</td>
                            <td>{{$trs->status }}</td>
                        </tr>
                        @endforeach
                        @empty
                        @endforelse
                    </tbody>
                </table>
                @else
                Aucune commande n'a encore été faite
                @endif
            </div>
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
    const input = document.getElementById('search-form');
    filter = input.value.toUpperCase();
    table = document.getElementById('myTable');
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
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
@extends('admin.app')
@section('content')
<link rel="stylesheet" href="{{secure_asset('css/adminTable.css')}}">
<link rel="stylesheet" href="{{secure_asset('css/tables.css') }}">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des évènements</li>
    </ol>
</nav>


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

<div class="container py-md-5 py-4">
    <div class="waviy text-center mb-md-5 mb-4">
        <h1>Liste complet des évènements </h1>

        <!-- <div class="main-content"> -->
        <div class="">
            <div class="container mt-7">
                @if(count($events)>0)
                <div class="col">
                    <div class="cardtable shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Evènements</h3>
                        </div>
                        <div class="">
                            <div class="outer-wrapper">
                                <div class="table-wrapper">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nom Evènement</th>
                                                <th scope="col">Date début</th>
                                                <th scope="col">Date Fin</th>
                                                <th scope="col">Lieu</th>
                                                <th scope="col">Transactions</th>
                                                <th scope="col">Tickets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                            <tr class="tr">
                                                <td>{{ $event->event_name }}</td>
                                                <td>
                                                    <time datetime="2020-05-25 12:00:00">
                                                        {{date('d/m/Y H:i', strtotime($event->start_time))}}
                                                    </time>
                                                </td>
                                                <td>
                                                    <time datetime="2020-05-25 12:00:00">
                                                        {{date('d/m/Y H:i', strtotime($event->end_time))}}
                                                    </time>
                                                </td>
                                                <td>{{$event->zone}}</td>
                                                <td>
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="p-0" id="headingTwo">
                                                            <a href="{{route('transactions',$event->id)}}"
                                                                style="color: white; font-size:16px">Transactions 
                                                                    </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right" style="color: white">

                                                    <div class="dropdown nav-item">
                                                        <a class=" dropdown-toggle" type="button"
                                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Ticket liste <i class="fa fa-chevron-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            @foreach (tickeEvent($event->id) as $ticket)
                                                            <li>
                                                                <p class="dropdown-item" href="#">
                                                                    {{ $ticket->type_name }}
                                                                    <span>{{ $ticket->price }}f</span></p>
                                                            </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- accordions -->

    </div>
</div>
</div>
@endsection
@extends('admin.app')
@section('content')
 <link rel="stylesheet" href="{{secure_asset('css/adminTable.css')}}">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des évènements</li>
    </ol>
</nav>


    @if (session()->has('message'))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Message! </strong>{{ session('message') }}.
    </div>
    @endif

            <div class="container py-md-5 py-4">
                <div class="waviy text-center mb-md-5 mb-4">
                    <h1>Liste complet des évènements </h1>
                    
                      <div class="main-content">
                        <div class="container mt-7">
                        @if(count($events)>0)
                            <div class="col">
                              <div class="cardtable shadow">
                                <div class="card-header border-0">
                                  <h3 class="mb-0">Evènements</h3>
                                </div>
                                <div class="">
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
                                            <td >{{ $event->event_name }}</td>
                                            <td >
                                              <time datetime="2020-05-25 12:00:00">
                                                {{date('d/m/Y H:i', strtotime($event->start_time))}}
                                              </time>
                                            </td>
                                            <td > 
                                              <time datetime="2020-05-25 12:00:00" >
                                                {{date('d/m/Y H:i', strtotime($event->end_time))}}
                                              </time>
                                            </td>
                                            <td >{{$event->zone}}</td>
                                            <td >
                                              <div class="accordion" id="accordionExample">
                                                <div class="p-0" id="headingTwo">
                                                  <a href="{{route('admin_transaction',$event->id)}}" class="card__title " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: white; font-size:16px">Transactions <i class="fa fa-chevron-down"></i></a>
                                              </div>
                                              </div>
                                            </td>
                                            <td class="text-right" style="color: white">
                                             
                                                <div class="dropdown nav-item">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                       Ticket liste <i class="fa fa-chevron-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                      @foreach (tickeEvent($event->id) as $ticket)
                                                      <li><p class="dropdown-item" href="#">{{ $ticket->type_name }} {{ $ticket->price }}f</p></li>
                                                      @endforeach

                                                    </ul>
                                                  </div>
                                              
                                            </td>
                                          </tr>
                                      @endforeach    
                                    </tbody>
                                  </table>
                                </div>


                                {{-- Tableau transaction --}}

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body para__style">
                                    <table class="table align-items-center table-flush">
                                      <thead class="thead-light">
                                        <th>Prix du ticket</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                      </thead>
                                      <tbody>
                                      @foreach ($commandes as $commande)
                                       <tr class="tr">
                                         <td >{{ $commande->price }} F</td>
                                         <td >{{ $commande->created_at }}</td>
                                         <td >{{ event_status($commande->event_id) }}</td>
                                       </tr>
                                       @endforeach
                                      </tbody>
                                    </table>
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
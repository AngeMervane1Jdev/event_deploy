@extends('admin.app')
@section('content')
 <link rel="stylesheet" href="{{ secure_asset('css/adminTable.css')}}">
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
                    <h1>Liste complette des évènements </h1>
                    
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
                                        <tr class="tr">
                                            <td >Bonjout</td>
                                            <td >$2,500 USD </td>
                                            <td > Zero</td>
                                            <td >Moufid</td>
                                            <td >
                                              <div class="accordion" id="accordionExample">
                                                <div class="p-0" id="headingTwo">
                                                  <a href="#" class="card__title " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: white; font-size:16px">Transactions <i class="fa fa-chevron-down"></i></a>
                                              </div>
                                              </div>
                                            </td>
                                            <td class="text-right" style="color: white">
                                             
                                                <div class="dropdown nav-item">
                                                    <a class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                       Ticket liste <i class="fa fa-chevron-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                      <li><p class="dropdown-item" href="#">VIP Simple 2500f</p></li>
                                                      <li><p class="dropdown-item" href="#">VIP Simple 2500f</p></li>
                                                      <li><p class="dropdown-item" href="#">VIP Simple 2500f</p></li>
                                                    </ul>
                                                  </div>
                                              
                                            </td>
                                          </tr>
                                          
                                    </tbody>
                                  </table>
                                </div>


                                {{-- Tableau transaction --}}

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body para__style">
                                    <table class="table align-items-center table-flush">
                                      <thead class="thead-light">
                                        <th>Transaction</th>
                                        <th>Prix du ticket</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                      </thead>
                                      <tbody>
                                       <tr class="tr">
                                         <td style="color: white">Reservation</td>
                                         <td >25000f</td>
                                         <td >2022-03-05</td>
                                         <td >En cours</td>
                                       </tr>
                                      
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
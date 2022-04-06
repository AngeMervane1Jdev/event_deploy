@extends('layouts.app')

@section('content')
 <!-- inner banner -->
 <div class="inner-banner" style="background: url('{{ secure_asset('images/in.jpg')}}') no-repeat top; background-size: cover;">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Promoteur</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Tableau de bord</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->
    <div class="blog-section py-5" id="events">
        <div class="container py-md-5 py-4">
            <div class="waviy text-center mb-md-5 mb-4">
                <span style="--i:1">L</span>
                <span style="--i:2">i</span>
                <span style="--i:3">s</span>
                <span style="--i:4">t</span>
                <span style="--i:5">e</span>
                <span style="--i:6"> </span>
                <span style="--i:7">d</span>
                <span style="--i:8">e</span>
                <span style="--i:9">s</span>
                <span style="--i:9"> </span>
                <span style="--i:10">t</span>
                <span style="--i:11">r</span>
                <span style="--i:12">a</span>
                <span style="--i:13">n</span>
                <span style="--i:14">s</span>
                <span style="--i:15">a</span>
                <span style="--i:16">c</span>
                <span style="--i:17">t</span>
                <span style="--i:18">i</span>
                <span style="--i:19">o</span>
                <span style="--i:20">n</span>
                <span style="--i:21">s</span>
            </div>

            <div class="container m-3">
                  <div class="container py-md-5 py-4">
                    @if (count($commandes)!=null)
                    <table class=" container text-center mt-5" >
                      <thead >
                        <tr style="background-color:black">
                            <td style="color:white">Evènement</td>
                            <td style="color:white">Ticket</td>
                            <td style="color:white">Prix </td>
                            <td style="color:white">Date</td>
                            <td style="color:white">Action</td>
                        </tr>
                      </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                            <tr>

                              <td>{{ $commande->event_name }}</td>
                              <td>{{ $commande->type_name }}</td>
                              <td>{{ $commande->price }} FCFA </td>
                              <td>{{ $commande->created_at }}</td>
                              <td>
                                  {{-- @if($commande->status==0)
                                  <a href="{{ route('publish_commande',$commande->id) }}" class="btn btn-outline-primary">Valider Commande</a></td>
                                  @elseif($commande->status==1)
                                  <a href="{{ route('promotor_dashboard') }}" class="btn btn-outline-success">Commande Effectué</a>
                                  @endif --}}
                                  {{ event_status($commande->event_id) }}
                                </td>
                            </tr>
                          @endforeach
                          </tbody>

                    </table>
                    @else
                    <div class="alert alert-info text-center">Aucune transaction</div>
                    @endif
                  </div>
            </div>

        </div>

    </div>
@endsection
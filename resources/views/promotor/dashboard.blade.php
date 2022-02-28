@extends('layouts.app')

@section('content')

 <!-- inner banner -->
 <div class="inner-banner ">
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
                <span style="--i:7">de</span>
                <span style="--i:8"> </span>
                <span style="--i:1">v</span>
                <span style="--i:8">o</span>
                <span style="--i:3">s</span>
                <span style="--i:1"> </span>
                <span style="--i:2">E</span>
                <span style="--i:3">v</span>
                <span style="--i:4">è</span>
                <span style="--i:5">n</span>
                <span style="--i:6">e</span>
                <span style="--i:7">m</span>
                <span style="--i:8">e</span>
                <span style="--i:1">n</span>
                <span style="--i:2">t</span>


            </div>

            <div class="row">
                    @forelse($events as $event)
                            <div class="container py-4">
                                <h1 class="h1 text-center" id="pageHeaderTitle"></h1>

                                <article class="postcard dark red">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="{{asset('images/logo.png')}}" alt="Image Title" />
                </a>
                <div class="postcard__text">
                    <h1 class="postcard__title red"><a href="#">{{$event->event_name}}</a></h1>

                     <div class="postcard__preview-txt">{{$event->event_description}}</div>
                    <div class="postcard__bar"> </div>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                        <img src="https://img.icons8.com/ios-filled/15/ffffff/calendar--v1.png"/> Du {{date_formater($event->start_time)["jour"]}} {{date_formater($event->start_time)["jourMois"]}} {{date_formater($event->start_time)["mois"]}} {{date_formater($event->start_time)["annee"]}}
                        </time>
                     <time datetime="2020-05-25 12:00:00" style="margin-left:10px;">
                        <img src="https://img.icons8.com/ios-filled/15/ffffff/time.png"/> {{date_formater($event->start_time)["heure"]}}h {{date_formater($event->start_time)["minutes"]}}min
                    </time>

                    <time datetime="2020-05-25 12:00:00" class="finEvent" style="margin-right:auto;color:var(--orange);margin-top:10px">
                                 <img src="https://img.icons8.com/ios-filled/15/ffffff/calendar--v1.png"/> Au {{date_formater($event->end_time)["jour"]}} {{date_formater($event->end_time)["jourMois"]}} {{date_formater($event->end_time)["mois"]}} {{date_formater($event->end_time)["annee"]}}
                        </time>
                            <time datetime="2020-05-25 12:00:00" style="margin-left:10px;color:var(--orange) " >
                                <img src="https://img.icons8.com/ios-filled/15/ffffff/time.png"/> {{date_formater($event->end_time)["heure"]}}h {{date_formater($event->end_time)["minutes"]}}min
                            </time>
                     </div>
                   <ul class="postcard__tagbox">
                     <li class="tag__item">
                        <div class="postcard__subtitle small" style="margin-left:50px;margin-right:auto;color:var(--orange);">
                                <p><img src="https://img.icons8.com/material-outlined/15/ffffff/address.png"/>  {{$event->zone}}</p>
                            </div>
                        </li>


                        <li class="tag__item play red" style="margin-left:auto;margin-right:auto;">
                            <a href="#"> @if ($event->status==1)
                                Publié <img src="https://img.icons8.com/ios-glyphs/25/26e07f/checked-2--v1.png"/>
                                @elseif ($event->status==0)
                                En attente <img src="https://img.icons8.com/material-outlined/24/4a90e2/hourglass--v2.png"/>
                                @endif
                            </a>
                        </li>
                   </ul>

                </div>
            </article>
                            </div>
                                <div class="btns">

                                    <a href="{{route('show_event',$event->id)}}" class="btn btn-outline-primary">En savoir +</a>
                                    <a href="{{route('event_ticket_add',$event->id)}}" class="btn btn-outline-primary">Ajouter un ticket</a>

                                    @empty
            <h1 style="text-align:center; color:var(--white); margin-top:20px; font-size:17px">Aucun evènement disponible</h1>
        @endforelse
        </div>

    </div>
    <div class="container py-md-5 py-4">
        <h1 class="text-center fs-4">Liste des commnades</h1>
        <table class=" container text-center mt-5" >
              <thead >
          <tr style="background-color:black">

            <td style="color:white">Prix</td>
            <td style="color:white">Action</td>

        </tr>
          </thead>
            <tbody>
                @forelse ($commandes as $commande)
                <tr>

                  <td>{{ $commande->price }} FCFA</td>
                  <td>
                      @if($commande->status==0)
                      <a href="{{ route("publish_commande",$commande->id) }}" class="btn btn-outline-primary">Valider Commande</a></td>
                      @elseif($commande->status==1)
                      <a href="{{ route('promotor_dashboard') }}" class="btn btn-outline-success">Commande Effectué</a>
                      @endif
                      </td>
                </tr>
                @empty
                <li><h1>Aucune commande en cour</h1></li>
               @endforelse
              </tbody>

        </table>
      </div>
  @endsection

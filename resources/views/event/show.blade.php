@extends('layouts.app')

@section('content')

 <!-- inner banner -->
 <div class="inner-banner ">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                @auth
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">{{ Auth::user()->name }}</h4>
                @endauth
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Evènement crée</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->



    <div class=" " id="events">
        @include("/event/slide")
        <div class="container py-md-5 py-4">
        @if (session()->has('message'))
              <div class="alert alert-info">{{ session('message') }}</div>
        @endif

            <div class="waviy text-center ">
                <span style="--i:1">E</span>
                <span style="--i:2">v</span>
                <span style="--i:3">è</span>
                <span style="--i:4">n</span>
                <span style="--i:5">e</span>
                <span style="--i:6">m</span>
                <span style="--i:7">e</span>
                <span style="--i:8">n</span>
                <span style="--i:1">t</span>
                <span style="--i:8"> </span>
                <span style="--i:3"> </span>
                <span style="--i:1">C</span>
                <span style="--i:2">r</span>
                <span style="--i:3">é</span>
                <span style="--i:5">e</span>


            </div>


            <div class="row">
              <div class="container py-4">
                    <h1 class="h1 text-center" id="pageHeaderTitle"></h1>
                    <article class="postcard dark red">
                <a class="postcard__img_link" href="#">
                @if($event->cover!=null)
                  <img src="{{secure_asset('Upload/events/Covers/'.$event->cover)}}" class="postcard__img">
                @else
                  <img class="postcard__img" src="{{secure_asset('images/logo.png')}}" alt="Image Title"  />
                @endif
                </a>
                <div class="postcard__text">
                    <h1 class="postcard__title red"  style="color:wheat"><a href="#">{{$event->event_name}}</a></h1>

                     <div class="postcard__preview-txt">{{$event->event_description}}</div>
                    <div class="postcard__bar"> </div>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                        @php $date=date_formater($event->start_time) @endphp
                        <img src="https://img.icons8.com/ios-filled/15/ffffff/calendar--v1.png"/> Du {{$date["jour"]}} {{$date["jourMois"]}} {{$date["mois"]}} {{$date["annee"]}}
                        </time>
                     <time datetime="2020-05-25 12:00:00" style="margin-left:10px;">
                        <img src="https://img.icons8.com/ios-filled/15/ffffff/time.png"/> {{$date["heure"]}}h {{$date["minutes"]}}min
                    </time>

                    <time datetime="2020-05-25 12:00:00" class="finEvent" style="margin-right:auto;color:var(--orange);margin-top:10px">
                    @php $date=date_formater($event->end_time) @endphp
                                 <img src="https://img.icons8.com/ios-filled/15/ffffff/calendar--v1.png"/> Au {{$date["jour"]}} {{$date["jourMois"]}} {{$date["mois"]}} {{$date["annee"]}}
                        </time>
                            <time datetime="2020-05-25 12:00:00" style="margin-left:10px;color:var(--orange) " >
                                <img src="https://img.icons8.com/ios-filled/15/ffffff/time.png"/> {{$date["heure"]}}h {{$date["minutes"]}}min
                            </time>
                     </div>
                   <ul class="postcard__tagbox">
                     <li class="tag__item">
                        <div class="postcard__subtitle small" style="margin-left:50px;margin-right:auto;color:var(--orange);">
                                <p><img src="https://img.icons8.com/material-outlined/15/ffffff/address.png"/>  {{$event->zone}}</p>
                            </div>
                        </li>


                        <li class="tag__item play red" style="margin-left:auto;margin-right:auto;">
                            <button disabled class="text-light"> @if ($event->status==1)
                                Publié <img src="https://img.icons8.com/ios-glyphs/25/26e07f/checked-2--v1.png"/>
                                @elseif ($event->status==0)
                                En attente <img src="https://img.icons8.com/material-outlined/24/4a90e2/hourglass--v2.png"/>
                                @endif
                            </button>
                        </li>
                   </ul>

                </div>
            </article>
            <h1 style=" margin-left: 20px; font-size:15px;  font-family: cursive;">Evènement organisé par  <span style="color:#fd7e14; font-size:17px">{{$event->user()->get()->first()->name}}</span></h1>

                </div>
                     <div class="btns">

                        @auth
                            @if(Auth::user()->id== $event->user()->get()[0]->id )
                                @if($event->status==0 and count($event->tickets()->get())!=0)
                                    <a href="{{ route('publish_event',$event->id) }}" class="btn btn-sucess">Publier</a>
                                @endif
                                @if($event->start_time>now())
                                    <a href="{{ route('edit_event',$event->id) }}" class="btn btn-info">Modifier</a>
                                @endif
                                @if(!($event->end_time>now() and now()>$event->start_time))
                                    <a href="{{ route('delete_event',$event->id) }}" class="btn btn-danger">Supprimer</a>
                                @endif
                            @endif
                            @endauth
                     </div>
                </div>

                     @include("/ticket/_index")

    </div>
  @endsection

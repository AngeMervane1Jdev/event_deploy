@extends('layouts.app')

@section('content')

<!-- inner banner -->
<div class="inner-banner " style="background: url('{{ secure_asset('images/in.jpg')}}') no-repeat top; background-size: cover;">
    <section class="w3l-breadcrumb">
        <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Evènement</h4>

        <div class="container py-md-5 py-4">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{url('/')}}">Accueil</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Evènement crée</li>
            </ul>
        </div>
    </section>
</div>
<!-- //inner banner -->



<div class=" " id="events">
    @include("/event/slide")
    <div class="container py-md-5 py-4">
        @if(session()->has('message'))
           <script>
                window.onload = function() {
               swal({
                   title: "{{session('message')}}",
                   type: 'warning'
               })
            }
           </script>
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
                        <img src="{{ secure_asset('Upload/events/Covers/'.$event->cover)}}" class="postcard__img">
                        @else
                        <img class="postcard__img" src="{{ secure_asset('images/logo.png')}}" alt="Image Title" />
                        @endif
                    </a>
                    <div class="postcard__text">
                        <h1 class="postcard__title red" style="color:wheat"><a href="#">{{$event->event_name}}</a></h1>


                        <div class="postcard__preview-txt">{{$event->event_description}}</div>
                        <div class="postcard__bar"> </div>
                        <div class="postcard__subtitle small">
                            <time datetime="2020-05-25 12:00:00">
                                {{date('d/m/Y H:i', strtotime($event->start_time))}}
                            </time>
                            -
                            <time datetime="2020-05-25 12:00:00">
                                {{date('d/m/Y H:i', strtotime($event->end_time))}}
                            </time>
                            <p> Lieu: {{$event->zone}}</p>
                            <p><span style="color:#fd7e14; font-size:17px;"> Organissateur:
                                    {{strtoupper($event->user()->get()->first()->name)}}</span></p>
                        </div>
                        <ul class="postcard__tagbox">

                            @auth

                            @if(Auth::user()->id==$event->user()->get()->first()->id)

                            <li class="tag__item play red" style="margin-left:auto;margin-right:auto;">
                                <button disabled class="text-light">
                                    @if ($event->status==1)
                                    Publié
                                    @elseif ($event->status==0)
                                    En attente
                                    @endif
                                </button>
                            </li>
                            @endif

                            @endauth
                        </ul>


                </article>

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
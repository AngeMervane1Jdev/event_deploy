@extends('layouts.app')
@section('content')

 <!-- inner banner -->
 <div class="inner-banner " style="background: url('{{ secure_asset('images/inner-bannerList.jpg')}}') no-repeat top; background-size: cover;">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                @auth
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">{{ Auth::user()->name }}</h4>
                @endauth
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Evènements disponibles</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->

    <div class="blog-section py-5" >

    </div>

    @if (session()->has('message'))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Message! </strong>{{ session('message') }}.
    </div>
    @endif

    <div class="" id="events">
        <div class="container ">
            <form class="seach_events"  action="{{ route('search_event') }}" method="GET">
                @csrf
                <div class="input-group">
                    
                    <select name="categorie" title="Categorie" class="form-control" style="margin-right:15px;height:41px">
                       <option value="none" selected="" disabled="">Selectionner Categorie </option>
                        @forelse ($cats as $cat)
                        <option value="{{$cat->name}}" style="color:white;padding:5px;margin: 10px;">{{$cat->name}}</option>
                        @empty
                        @endforelse
                    </select>
                    <input type="search" class="form-control" placeholder="Rechercher un évènement" name="q">


                    <button type="submit" class="btn search-btn" style="color: white;">
                    <i class="fa fa-search"
                        aria-hidden="true"></i></button>
                </div>
            </form>

            <div class="container py-md-5 py-4">
                <div class="waviy text-center mb-md-5 mb-4">
                    <h1>Liste complette des évènements </h1>
                    @if(count($events)==0)
                    <em class="text-center" style="text-align: center; font-size:15px">Aucun évènement en cours</em>
                    @endif
                </div>

                @forelse ($events as $event)
                <div class="row">
                    <div class="container py-4">
                        <h1 class="h1 text-center" id="pageHeaderTitle"></h1>
                        <article class="postcard dark red">
                            <a class="postcard__img_link" href="#">
                            @if($event->cover!=null)
                              <img src="{{ secure_asset('Upload/events/Covers/'.$event->cover)}}" class="postcard__img">
                            @else
                              <img class="postcard__img" src="{{ secure_asset('images/logo.png')}}" alt="Image Title"  />
                            @endif
                            </a>
                            <div class="postcard__text">
                            <h1 class="postcard__title red"  style="color:wheat"><a href="#">{{$event->event_name}}</a></h1>
            
            
                                 <div class="postcard__preview-txt">{{$event->event_description}}</div>
                                <div class="postcard__bar"> </div>
                                <div class="postcard__subtitle small">
                                    <time datetime="2020-05-25 12:00:00">
                                    {{date('d/m/Y H:i', strtotime($event->start_time))}}
                                    </time>
                                  -
                                <time datetime="2020-05-25 12:00:00" >
                                    {{date('d/m/Y H:i', strtotime($event->end_time))}}
                                </time>
                                <p> Lieu: {{$event->zone}}</p>

                                 <p>
                                     @if (isset($event->name))
                                     <span style="color:#fd7e14; font-size:17px;"> Organisateur: {{strtoupper($event->name)}}</span>
                                     @else
                                     <span style="color:#fd7e14; font-size:17px;"> Organisateur: {{strtoupper($event->user->name)}}</span>
                                     @endif
                                </p>
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
            
                            </div>
                        </article>
                        <div class="btns" style="text-align:center; margin-top:11px">
                            <a href="{{route('show_event',$event->id)}}" class="btn btn-yellow">Details</a>


                        </div>
                        
                    </div>

                </div>
                @empty
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')


 <!-- inner banner -->
 <div class="inner-banner " style="background: url('{{secure_asset('images/in2.jpg')}}') no-repeat top; background-size: cover;">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">{{ Auth::user()->name }}</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Evènement</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #000;
            background: #f3e521;
            padding: 3px 7px;
            border-radius: 3px;
        }

        .bootstrap-tagsinput {
            width: 100%;
        }

    </style>

<section >
        <div class="contact-top py-md-5 py-4">
            <div class="container py-md-5 py-4">

            <div class="container">
                <div class="waviy text-center mb-md-5 mb-4">
                            <span style="--i:1">M</span>
                            <span style="--i:2">o</span>
                            <span style="--i:3">d</span>
                            <span style="--i:4">i</span>
                            <span style="--i:5">f</span>
                            <span style="--i:6">i</span>
                            <span style="--i:7">e</span>
                            <span style="--i:7">r</span>
                            <span style="--i:8"> </span>
                            <span style="--i:1">E</span>
                            <span style="--i:2">v</span>
                            <span style="--i:3">è</span>
                            <span style="--i:4">n</span>
                            <span style="--i:5">e</span>
                            <span style="--i:6">m</span>
                            <span style="--i:7">e</span>
                            <span style="--i:7">n</span>
                            <span style="--i:8">t</span>


                </div>


                <div class="contacts12-main">
                <form method="POST" action="{{ route('update_event') }}" enctype="multipart/form-data">
                                           @csrf

                                    <div class="form-group row">
                                        <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('Event Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="event_name" type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" value="{{$event->event_name}}" required autocomplete="event_name" autofocus>

                                            @error('event_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="event_description" class="col-md-4 col-form-label text-md-right">{{ __('Event description') }}</label>

                                        <div class="col-md-6">
                                            <input id="event_description" type="texterea" class="form-control @error('event_description') is-invalid @enderror" name="event_description" value="{{ $event->event_description}}" required autocomplete="event_description">
                                            @error('event_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="zone" class="col-md-4 col-form-label text-md-right">{{ __('Localisation') }}</label>

                                        <div class="col-md-6">
                                            <input id="zone" type="text" class="form-control @error('zone') is-invalid @enderror" name="zone" value="{{ $event->event_description }}" required autocomplete="zone">

                                            @error('zone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Date de commencement') }}</label>

                                        <div class="col-md-6">
                                            <input id="start_time" type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ $event->start_time }}" required autocomplete="start_time">

                                            @error('start_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="end_time" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin') }}</label>

                                        <div class="col-md-6">
                                            <input id="end_time" type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ $event->end_time }}" required autocomplete="end_time">

                                            @error('end_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Tags" class="col-md-4 col-form-label text-md-right">{{ __('Etiquettes') }}</label>
                                        <div class="col-md-6">

                                        <input class="form-control" type="text" value="{{$tags ?? null }}" data-role="tagsinput" name="tags" style="display: none;">
                                            @if ($errors->has('tags'))
                                                 <span class="text-danger">{{ $errors->first('tags') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                <div class="form-group row">
                                        <label for="zone" class="col-md-4 col-form-label text-md-right">{{ __('categories:') }}</label>

                                        <div class="col-md-6">
                                        <select class="form-control" name="categories[]" >
                                            <option value="none" selected="" disabled="">Select Category</option>
                                                @forelse ($categories as $cat)
                                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                @empty
                                                @endforelse
                                    </select>
                                        </div>
                                    </div>
                                <hr>




                                    <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4" style="margin-bottom:15px; margin-left:auto; margin-rigth:auto">
                                            <button type="submit" class="button">
                                                {{ __('Modifier') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                </div>
                <div class="wrapper-full">
                    <div class="line"></div>

                </div>
            </div>
        </div>
    </section>

    <script >
        tags.initialize();

$('[name=tags]').tagsinput( {
    typeaheadjs: {
        name: 'tags',
        source: tags.ttAdapter()
    }
});
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

    @endsection

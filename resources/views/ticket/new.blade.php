@extends('layouts.app')

@section('content')
 <!-- inner banner -->
 <div class="inner-banner ">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">{{ Auth::user()->name }}</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Ticket</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->

<section class="profile-page">
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">

            <div class="row justify-content-center p-3 py-4">
                <div class="text-center mt-3">
                <div class="waviy mb-sm-3 mb-2" style="text-align:center">
                            <span style="--i:1">A</span>
                            <span style="--i:2">j</span>
                            <span style="--i:3">o</span>
                            <span style="--i:4">u</span>
                            <span style="--i:5">t</span>
                            <span style="--i:6">e</span>
                            <span style="--i:7">r</span>
                            <span style="--i:7"> </span>
                            <span style="--i:8"> </span>
                            <span style="--i:1">T</span>
                            <span style="--i:2">i</span>
                            <span style="--i:3">c</span>
                            <span style="--i:4">k</span>
                            <span style="--i:5">e</span>
                            <span style="--i:6">t</span>


          </div>

          <form action="{{ route('event_ticket_create') }}" method="POST" class="main-input">


            @csrf
                <p>
                    <label for="type">Type de ticket</label>
                    <select class="form-control" name="type_id" id="type_id">
                <option value="none" selected="" disabled="">Select type de ticket</option>
                 @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->type_name}}</option>
                        @endforeach
            </select>
                </p>
            <p>
                <label for="price">Prix</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </p>
            <div style="margin-top:15px">
                 <input type="number" name="event_id" id="event_id" value="{{$id}}" hidden>
                <input type="submit" class="btn btn-primary" value="ajouter">

            </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>

 </section>
  @endsection

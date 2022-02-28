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

                            <span style="--i:8"> </span>
                            <span style="--i:1">T</span>
                            <span style="--i:2">i</span>
                            <span style="--i:3">c</span>
                            <span style="--i:4">k</span>
                            <span style="--i:5">e</span>
                            <span style="--i:6">t</span>


          </div>

                <div class="card-body">
                <h5 style="text-align:center; color:white; margin-top:20px; font-size:20px"> Type : {{$type}}</h5>
                <h5 style="text-align:center; color:white; margin-bottom:15px;  font-size:20px"> Prix : {{$ticket->price}}</h5>


                <div class="btns">
                    <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn btn-info">Modifier</a>
                    <a href="{{route('event_ticket_delete',$ticket->id)}}" class="btn btn-danger" >Supprimer</a>

                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

 </section>
  @endsection

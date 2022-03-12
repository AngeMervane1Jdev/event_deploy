@extends('admin.app')
@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste de organisateurs</li>
    </ol>
</nav>
<!-- //breadcrumbs -->

<!-- people -->
<section class="people">
    <section class="w3l-team-block">
        <!-- //people cards style 1 -->
        <div class="card card_border mb-5">
            <div class="cards__heading">
                <h3>Liste de organisateurs</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-primary">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Photo de profil</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user )  
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{  $user->email}}</td>
                            <td>
                            @if($user->profil_image!=null)
                                <img src="{{secure_asset('profils/'.$user->profil_image)}}" width="150" class="rounded-circle">

                             @else
                                <img src="{{secure_asset('images/defaults/profil.png')}}" id="profileImage" width="50" class="rounded-circle">
                             @endif
                            </td>
                            <td>{{ $user->contact }}</td>
                            <td>
                                <div class="text-center">
                                    <div class="dropdown">
                                        <a  class="dropdown-toggle" type="button" aria-expanded="false" aria-hidden="true" id="dropdownMenu3" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>
                                        <div class="dropdown-menu dropdown-primary">
                                            <a class="dropdown-item" href="#"><i class="fa fa-pencil" >Editer</i></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-times" >Supprimer</i></a>
                                        </div> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.app')
@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs</li>
    </ol>
</nav>
<!-- //breadcrumbs -->

<!-- people -->
<section class="people">
    <section class="w3l-team-block">
        <!-- //people cards style 1 -->
        <div class="card card_border mb-5">
            <div class="cards__heading">
                <h3>Liste des utilisateurs</h3>
            </div>
            <div class="card-body1">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-primary1">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
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
                            <td>{{ $user->typeuser->type_name }}</td>
                            <td>{{  $user->email}}</td>
                            <td>
                            @if($user->profil_image!=null)
                                <img src="{{asset('profils/'.$user->profil_image)}}" width="150" class="rounded-circle">

                             @else
                                <img src="{{asset('images/defaults/profil.png')}}" id="profileImage" width="50" class="rounded-circle">
                             @endif
                            </td>
                            <td>{{ $user->contact }} </td>
                            <td>
                                <div class="flex-shrink-0 dropdown text-center">
                                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-cogs"></i>
                                    </a>
                                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                        <li class="dropdown-item">  <a class="dropdown-item" href="{{ route('user_edit',['id'=>$user->id]) }}"><i class="fa fa-pencil" >Editer</i></a> </li>
                                        <li class="dropdown-item"> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal1"><i class="fa fa-times" >Supprimer</i></a> </li>
                                        
                                        <!-- <li class="dropdown-item"> <a class="dropdown-item" href="{{ route('user_delete',['id'=>$user->id]) }}"><i class="fa fa-times" >Supprimer</i></a> </li>   -->
                                    </ul> 
                                </div>
                            </td>
                        </tr>
                        
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-popup">
                    <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                    
                    <form  method="POST" action="" class="popup-form">
                        @csrf
                        <div class="form-group">
                            
                            <p>Voullez-vous supprimer <span>{{ $user->typeuser->type_name }} </span><span>{{ $user->name }}</span></p>
                        </div>
                        <button type="submit" class="btn" style="background-color: red; color:white"><a style=" color:white" class="" href="{{ route('user_delete',['id'=>$user->id]) }} ">Oui</a></button>
                        <button type="submit" class="btn" style="background-color: red; color:white"><a style=" color:white" class="" href="#">Non</a></button>
                    </form>
                </div>
                   
            </div>
	    </div>
    </section>
@endsection
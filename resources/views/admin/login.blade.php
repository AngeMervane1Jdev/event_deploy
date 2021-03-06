@extends('admin.app')
@section('content')
 <!-- breadcrumbs -->
 <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
    </ol>
</nav>
<!-- //breadcrumbs -->
<!-- forms -->
<section class="forms">
    <!-- forms 1 -->
    <div class="card card_border py-2 mb-4">
        <div class="cards__heading">
            <h3 >Connexion <span></span></h3>
        </div>
        <div class="card-body1">
            <form method="post" action="{{ route('login') }}" >
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="input__label">Email address</label>
                    <input type="email" class="form-control input-style" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="input__label">Password</label>
                    <input type="password" class="form-control input-style" id="exampleInputPassword1"
                        placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary btn-style mt-4">Me connecter</button>
            </form>
        </div>
    </div>
    <!-- //forms 1 -->
</section>


@endsection

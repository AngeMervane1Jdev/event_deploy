@extends('layouts.app')

@section('content')


 <!-- inner banner -->
 <div class="inner-banner ">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Client</h4>
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
            <span style="--i:1">T</span>
                <span style="--i:2">a</span>
                <span style="--i:3">b</span>
                <span style="--i:4">l</span>
                <span style="--i:5">e</span>
                <span style="--i:6">a</span>
                <span style="--i:7">u</span>
                <span style="--i:8"> </span>
                <span style="--i:8"> </span>
                <span style="--i:1">d</span>
                <span style="--i:8">e</span>
                <span style="--i:3"></span>
                <span style="--i:8"> </span>
                <span style="--i:2">b</span>
                <span style="--i:3">o</span>
                <span style="--i:4">r</span>
                <span style="--i:5">d</span>
                <span style="--i:3"></span>
                <span style="--i:8"> </span>

            </div>



      @if(count($commandes)>0)
      <table class="container">
          <thead>
          <tr>
            <th><h1>Evènement</h1></th>
            <th><h1>Durée de l'evènement</h1></th>
            <th><h1>Prix du ticket</h1></th>
            <th><h1>Statut</h1></th>
        </tr>
          </thead>
          <tbody>
          @foreach($commandes as $cmd)


          <tr>

              <td>{{$cmd->id}}</td>
              <td> Evènement du {{event_for_commande($cmd->id)->start_time}} au <span style="">{{event_for_commande($cmd->id)->end_time}}</span> </td>
              <td>{{$cmd->price}} FCFA</td>
              <td>
                  @if($cmd->status==0)
                   <p style="color:blue"> En Attente </p>
                  @elseif($cmd->status==1)
                  <p style="color:green"> Vendu </p>
                  @else
                  <p style="color:red"> Rejetté </p>
                  @endif
              </td>
          </tr>
        @endforeach
        @else
        Aucune commande n'a encore été faite
        @endif

    </tbody>
      </table>

</div>

</div>
</div>

@endsection

@extends('layouts.app')

@section('content')

 <!-- inner banner -->
 <div class="inner-banner " style="background: url('{{secure_asset('images/in.jpg')}}') no-repeat top; background-size: cover;">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Promoteur</h4>
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
                <span style="--i:1">L</span>
                <span style="--i:2">i</span>
                <span style="--i:3">s</span>
                <span style="--i:4">t</span>
                <span style="--i:5">e</span>
                <span style="--i:6"> </span>
                <span style="--i:7">de</span>
                <span style="--i:8"> </span>
                <span style="--i:1">v</span>
                <span style="--i:8">o</span>
                <span style="--i:3">s</span>
                <span style="--i:1"> </span>
                <span style="--i:2">E</span>
                <span style="--i:3">v</span>
                <span style="--i:4">è</span>
                <span style="--i:5">n</span>
                <span style="--i:6">e</span>
                <span style="--i:7">m</span>
                <span style="--i:8">e</span>
                <span style="--i:1">n</span>
                <span style="--i:2">t</span>
            </div>
            <div class="container py-md-5 py-4">
                @if(count($events)!=null)
                <div class="row mt-5">
                    <div class="col-md-5 mx-auto">
                        <div class="input-group">
                            <input class="form-control border" type="text" id="myInput" placeholder="Rechercher ....">
                        </div>
                    </div>
                </div>
                <table class="container text-center mt-5" >
                  <thead>
                    <tr style="background-color:black">
                        <td style="color:white">Numéro</td>
                        <td style="color:white">Evènement</td>
                        <td style="color:white">Lieu</td>
                        <td style="color:white">Status</td>
                        <td style="color:white">Durée </td>
                        <td style="color:white">Action</td>
                        <td style="color:white">Transaction</td>

                    </tr>
                  </thead>
                    <tbody id="myTable">
                        <?php $index=1  ;?>
                        @foreach($events as $event)
                        <tr>
                            <td>{{$index++}} </td>
                          <td>{{$event->event_name}}</td>
                          <td>{{$event->zone}}</td>
                          <td>
                            @if ($event->status==1)
                                  {{ __('Publié')  }}
                            @else 
                                 {{ __('Atente') }}   
                            @endif 
                          </td>'
                          <td>
                            <time datetime="2020-05-25 12:00:00">
                                {{date('d/m/Y H:i', strtotime($event->start_time))}}
                            </time>
                              -
                            <time datetime="2020-05-25 12:00:00" >
                                {{date('d/m/Y H:i', strtotime($event->end_time))}}
                            </time>
                          </td>
                          <td>
                            <a href="{{route('show_event',$event->id)}}" class="btn btn-primary">En savoir +</a>
                         </td>
                          <td>
                            <a href="{{route('organizer_promotor_transaction',$event->id)}}" class="btn btn-primary">Transaction </a>
                        </td>
                        </tr>
                       @endforeach
                      </tbody>
        
                </table>
                @else
                <div class="alert alert-info"> Aucun evènement disponible</div>
                @endif
              </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>
  @endsection

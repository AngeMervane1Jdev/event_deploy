@extends('layouts.app')

@section('content')


 <!-- inner banner -->
 <div class="inner-banner " style="background: url('{{ secure_asset('images/in.jpg')}}') no-repeat top; background-size: cover;">
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
            

        @if (session()->has('message'))
              <div class="alert alert-info">{{ session('message') }}</div>
        @endif
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



      @if(count($transactions)>0)
      <div class="seach_events" >

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher une transaction" name="q" id="search-form" onkeyup="myFunction()" >
                </div>
            </div>
            
      <table class="container table-bordered table-sm m-3" id="myTable">
          <thead>
          <tr>
            <th><h1>#</h1></th>
            <th><h1>Evènement</h1></th>
            <th><h1>Type de Ticket</h1></th>
            <th><h1>Prix ticket</h1></th>
            <th><h1>Statut evenemnt</h1></th>
            <th><h1>Date d'achat du ticket</h1></th>
            <th><h1>Status transaction</h1></th>
        </tr>
          </thead>
          <tbody>
          @php $index=0 @endphp
          @forelse($transactions as $trs)

            @foreach(json_decode($trs->ticket_id,true) as $quantity => $id)
                <tr>
                <td>{{ ++$index}}</td>
                 @php $e_and_t =event_and_tiket($id)  @endphp
                    <td>
                        
                        {{ array_key_first($e_and_t) }}
                        @php $ticket=$e_and_t[array_key_first($e_and_t)] @endphp
                    </td>

                    <td>
                            @if($ticket->type_id==1)
                                {{__("VIP")}}
                            @elseif($ticket->type_id==2)
                                {{ __("RESERVATION")}}
                            @else($ticket->type_id==3)
                                {{__("SIMPLE")}}
                            @endif
                                        
                    </td>

                    <td>
                        {{ $ticket->price }} FCFA
                    </td>
                    

                    <td>
                        {{event_status($ticket->event_id) }}
                    </td>
                    <td>
                            {{ $trs->created_at }}
                        </td>

                  <td>
                      {{$trs->status }}
                  </td>
             </tr>
             @endforeach
        @empty
        @endforelse
        </tbody>
      </table>
    @else
    Aucune commande n'a encore été faite
    @endif

    

</div>

</div>
</div>

 <script>
    // const query=document.getElementById('search-form');
    // query.addEventListener('click', function(e){
    //     alert("salut")
    // })

function myFunction() {
  var input1, filter, table, tr, td, i, txtValue;
  const input=document.getElementById('search-form');
  filter = input.value.toUpperCase();
  table = document.getElementById('myTable');
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
 </script> 
@endsection

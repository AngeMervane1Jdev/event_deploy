
<h1 style="text-align:center; margin-top:20px; color:var(--orange)">Liste des tickets de l'évenement</h1>
<div class="row">
    {{-- <div class="grids-area-hny main-cont-wthree-fea row">

        <div class="col-lg-4 col-md-6 grids-feature mt-md-0 mt-4">
            <div class="area-box">
                <img src="{{secure_asset('')}}" alt="" class="img-fluid">
                <h4><a href="#feature" class="title-head">Unique Scenarios</a></h4>
                <p class="">Vivamus a ligula quam tesque et libero ut justo, ultrices in. Ut eu leo non. Duis
                    sed dolor et amet.</p>
            </div>
        </div>
    </div> --}}
<div class="container py-4">
@if(count($tickets)!=0)
@foreach($tickets as $ticket)
<div class="ticket courses-container">
	<div class="course">
		<div class="course-preview">
			<h6 style="color:white;">Ticket</h6>
		</div>
		<div class="course-info ">
			<h6>Numéro</h6>
			<h2>
            @if($ticket->type_id==1)
                   VIP
            @elseif($ticket->type_id==2)
                     RESERVATION
            @else
                  SIMPLE
            @endif
            </h2>
			<h1 class="prix">XOF {{$ticket->price}}</h1>
		</div>
	</div>
</div>
       <div class="btns" style="text-align: center;">
                        @auth
                                @if( Auth::user()->id== $event->user()->get()[0]->id)
                                    <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn btn-info">Modifier</a>
                                    <a href="{{route('event_ticket_delete',$ticket->id)}}" class="btn btn-danger" >Supprimer</a>
                                @elseif(Auth::user()->type_user_id==3)

                                        <a href="{{ route('new_portemonnaie',[$ticket->id,$ticket->price]) }}" class="btn btn-sucess">Acheter</a>
                                        <a href="{{ route('add_ticket_to_panier',$ticket->id) }}" class="btn btn-sucess">Ajouter au panier</a>

                                @endif
                        @else
                            <a href="{{ route('new_portemonnaie',[$ticket->id,$ticket->price]) }}" class="btn btn-sucess">Acheter</a>
                            <a href="{{ route('add_ticket_to_panier',$ticket->id) }}" class="btn btn-sucess">Ajouter au panier</a>

                        @endauth
                    </div>
@endforeach
@endif

    </div>
    @auth
@if(Auth::user()->id== $event->user()->get()[0]->id)
        <p style="text-align: center;"><a href="{{route('event_ticket_add',$event->id)}}" class="btn btn-info text-center">Ajouter un ticket</a></p>
        <p style="text-align: center;"><a href="{{route('add_images_form',$event->id)}}" class="btn btn-info text-center ml-3">Ajouter des images</a></p>
@endif
@endauth
</div>



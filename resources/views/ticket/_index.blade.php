
<h1 style="text-align:center; margin-top:20px; color:var(--orange)">Tickets disponibles</h1>
<div class="row">
<div class="container py-4">
@if(count($tickets)!=0)
@foreach($tickets as $ticket)
<div class="ticket courses-container">
	<div class="course">
		<div class="course-preview">
			<h6 style="color:white;">Ticket</h6>
            <p class="prix2">XOF {{$ticket->price}}</p>
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

            <p><a href="{{ route('new_portemonnaie',[$ticket->id,$ticket->price]) }}" class=" show-me-ticket" style="background-color:#f15000;color:white;border-radius:10px;padding-left:5px;padding-right:5px" >Acheter</a>
            <a href="{{ route('add_ticket_to_panier',$ticket->id) }}" class=" show-me-ticket" style="background-color:#f15000;color:white;border-radius:10px ;padding-left:5px;padding-right:5px"  >Ajouter au panier</a></p>

			<h1 class="prix">XOF {{$ticket->price}}</h1>
            
            
		</div>
	</div>
</div>
       <div class="btns" style="text-align: center;">
            @auth
                    @if( Auth::user()->id== $event->user()->get()[0]->id)
                        <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn btn-info">Modifier</a>
                        <a href="{{route('event_ticket_delete',$ticket->id)}}" class="btn btn-danger" >Supprimer</a>
                    
                    @endif
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



@extends('admin.app')
@section('content')

<h1 style="text-align:center; margin-top:20px; color:var(--orange)">Liste des tickets de l'évenement</h1>
<div class="row">
<div class="container py-4">

{{-- @foreach($tickets ?? '' as $ticket) --}}
<div class="ticket courses-container">
	<div class="course">
		<div class="course-preview">
			<h6 style="color:white;">Ticket</h6>
		</div>
		<div class="course-info ">
			<h6>Numéro</h6>
			<h2>
                SIMPLE
            {{-- @if($ticket->type_id==1)
                   VIP
            @elseif($ticket->type_id==2)
                     RESERVATION
            @else
                  SIMPLE
            @endif --}}
            </h2>
			<h1 class="prix">XOF 555</h1>
		</div>
	</div>
</div>
       <div class="btns" style="text-align: center;">
                        {{-- @auth
                                @if( Auth::user()->id== $ticket->event()->get()[0]->user()->get()[0]->id)
                                    <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn btn-info">Modifier</a>
                                    <a href="{{route('event_ticket_delete',$ticket->id)}}" class="btn btn-danger" >Supprimer</a>
                                @elseif(Auth::user()->type_user_id==3)

                                        <a href="{{ route('new_portemonnaie',[$ticket->id,$ticket->price]) }}" class="btn btn-sucess">Acheter</a>
                                        <a href="{{ route('add_ticket_to_panier',$ticket->id) }}" class="btn btn-sucess">Ajouter au panier</a>

                                @endif
                        @else
                            <a href="{{ route('new_portemonnaie',[$ticket->id,$ticket->price]) }}" class="btn btn-sucess">Acheter</a>
                            <a href="{{ route('add_ticket_to_panier',$ticket->id) }}" class="btn btn-sucess">Ajouter au panier</a>

                        @endauth --}}
                    </div>
{{-- @endforeach
@else

@endif

    </div>
    @auth
@if(Auth::user()->type_user_id!=3)
        <p style="text-align: center;"><a href="{{route('event_ticket_add',$event->id)}}" class="btn btn-info text-center">Ajouter un ticket</a></p>
@endif
@endauth --}}
</div>

<style>
    .ticket {
    font-family: "Muli", sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.course {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    max-width: 100%;
    margin: 20px;
    overflow: hidden;
    width: 700px;
}

.course h6 {
    color: white;
    margin: 0;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.course h2 {
    color: white;
    letter-spacing: 1px;
    margin: 10px 0;
}

.course-preview {
    background-image: url(../images/logo.png);
    color: #fff;
    padding: 30px;
    max-width: 250px;
}

.course-info {
    background: linear-gradient(to bottom, #a9c9ff 0%, #18151f 100%);
    padding: 30px;
    position: relative;
    width: 100%;
}

.prix {
    color: var(--orange);
    font-size: 16px;
    padding: 12px 25px;
    position: absolute;
    bottom: 30px;
    right: 30px;
    letter-spacing: 1px;
}

@media screen and (max-width: 480px) {
    .social-panel-container.visible {
        transform: translateX(0px);
    }
}

</style>

@endsection

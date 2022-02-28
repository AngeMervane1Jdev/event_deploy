
<h1 style="text-align:center; margin-top:20px; color:var(--orange)">Liste des tickets de l'évenement</h1>
<div class="row">
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
                                @if( Auth::user()->id== $ticket->event()->get()[0]->user()->get()[0]->id)
                                    <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn btn-info">Modifier</a>
                                    <a href="{{route('event_ticket_delete',$ticket->id)}}" class="btn btn-danger" >Supprimer</a>
                                @elseif(Auth::user()->type_user_id==3)
                                    @if(in_array("".$ticket->id,$buy_ids)!="")
                                        <button class="btn btn-info" disabled >Acheté</button>
                                    @else
                                        <a href="{{ route('buy_ticket',$ticket->id) }}" class="btn btn-sucess">Acheter</a>
                                    @endif
                                @endif
                        @else
                            <a href="{{ route('buy_ticket',$ticket->id) }}" class="btn btn-sucess">Acheter</a>
                        @endauth
                    </div>
@endforeach
@else

@endif
    </div>
    @auth 
@if(Auth::user()->type_user_id!=3)
        <p style="text-align: center;"><a href="{{route('event_ticket_add',$event->id)}}" class="btn btn-info text-center">Ajouter un ticket</a></p>
@endif   
@endauth
</div>



<!-- <div class=" blog-section py-5">
@if(count($tickets)!=0)
@foreach($tickets as $ticket)
    <div class="container ticket py-4">
                    <h1 class="h1 text-center" id="pageHeaderTitle"></h1>

                    <article class="postcard ticket dark red">
                        <div class="postcard__text">
                            <h1 class="postcard__title red"><a href="#"> Ticket</a></h1>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                @if($ticket->type_id==1)
                                    VIP
                                @elseif($ticket->type_id==2)
                                        RESERVATION
                                @else
                                        SIMPLE
                                @endif
                                    </time>
                            </div>
                            <div class="postcard__bar"></div>

                            XOF {{$ticket->price}}
                        </div>


                    </article>
                    <div class="btns">
                        @auth
                                @if( Auth::user()->id== $ticket->event()->get()[0]->user()->get()[0]->id)
                                    <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn btn-info">Modifier</a>
                                    <a href="{{route('event_ticket_delete',$ticket->id)}}" class="btn btn-danger" >Supprimer</a>
                                @elseif(Auth::user()->type_user_id==3)
                                    @if(in_array("".$ticket->id,$buy_ids)!="")
                                        <button class="btn btn-info" disabled >Acheté</button>
                                    @else
                                        <a href="{{ route('buy_ticket',$ticket->id) }}" class="btn btn-sucess">Acheter</a>
                                    @endif
                                @endif
                        @else
                            <a href="{{ route('buy_ticket',$ticket->id) }}" class="btn btn-sucess">Acheter</a>
                        @endauth
                    </div>
    </div>

@endforeach
@else

@endif
 @auth 
@if(Auth::user()->type_user_id!=3)
        <p><a href="{{route('event_ticket_add',$event->id)}}" class="btn btn-info text-center">Ajouter un ticket</a></p>
@endif   
@endauth

</div> -->
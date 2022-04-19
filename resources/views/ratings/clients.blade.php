@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

<!-- inner banner -->
<div class="inner-banner " style="background: url('{{ secure_asset('profils/in.jpg')}}') no-repeat top; background-size: cover;">
    <section class="w3l-breadcrumb">
        <div class="container py-md-5 py-4">
            <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Notations</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Accueil</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Notations</li>
            </ul>
        </div>
    </section>
</div>
<!-- //inner banner -->

<div class="blog-section" id="events">
    <div class="container py-md-5 py-4">
        @if(session()->has('message'))
           <script>
               swal({
                title: "{{session('message')}}",
                   icon: 'warning'
               })
           </script>
        @endif
        <div class="waviy text-center mb-md-5">
            <span style="--i:1">P</span>
            <span style="--i:2">o</span>
            <span style="--i:3">r</span>
            <span style="--i:4">t</span>
            <span style="--i:5">m</span>
            <span style="--i:6">o</span>
            <span style="--i:7">n</span>
            <span style="--i:8">n</span>
            <span style="--i:1">a</span>
            <span style="--i:8">i</span>
            <span style="--i:3">e</span>


        </div>
        <div class="container">
           <div class="row">

                @foreach($profils as $profil)
                  <div class="col-sm md-4">
                     <div class="card text-center bg-light">
                        <div class="card-img" style="margin-top: 5px;">
                              @if($profil->user()->get()[0]->profil_image != null)
                                <img src="{{ secure_asset('profils/'.$profil->user()->get()[0]->profil_image)}}" width="150" class="rounded-circle">
                                @else
                                    <img src="{{ secure_asset('images/user-admin.png')}}" id="profileImage" width="150" class="rounded-circle">
                               @endif
                        </div>
                        <div class="card-body">
                            @if(Auth::user()->id==$profil->user()->get()[0]->id)
                                Vous
                                @else
                                {{ucfirst($profil->user()->get()[0]->name)}}
                            @endif
                        </div>
                        <div class="star-rating card-footer" id="{{ $profil->id }}">
                            <span class="count-number">5</span>
                            @if($profil->rates > 0)
                            <div id="{{ $profil->id . '.1' }}" data-toggle="tooltip" title="1"  class="star-yellow">
                                @else
                                <div id="{{ $profil->id . '.1' }}" data-toggle="tooltip" title="1">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                            @if($profil->rates > 1)
                            <div id="{{ $profil->id . '.2' }}" data-toggle="tooltip" title="2"   class="star-yellow">
                            @else 
                            <div id="{{ $profil->id . '.2' }}" data-toggle="tooltip" title="2">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>
                            @if($profil->rates > 2)
                            <div id="{{ $profil->id . '.3' }}" data-toggle="tooltip" title="3"  class="star-yellow">
                                @else 
                            <div id="{{ $profil->id . '.3' }}" data-toggle="tooltip" title="3" >
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                            @if($profil->rates > 3)
                            <div id="{{ $profil->id . '.4' }}" data-toggle="tooltip" title="4"  class="star-yellow">
                                @else
                            <div id="{{ $profil->id . '.4' }}" data-toggle="tooltip" title="4"  >
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>
                            @if($profil->rates > 4)
                            <div id="{{ $profil->id . '.5' }}" data-toggle="tooltip" title="5"   class="star-yellow">
                                @else
                            <div id="{{ $profil->id . '.5' }}" data-toggle="tooltip" title="5">
                            @endif
                            <i style="padding:5px" class="material-icons">star_rate</i>
                            </div>

                        </div>
                     </div>
                  </div>
                    
                @endforeach
           </div>
        </div>


    </div>
</div>




<script>


 let memoStars = [];
 window.onload = function() {
 $('.star-rating div').click((e) => {
   
   
       let element = $(e.currentTarget)
       console.log(element)
       let values = element.attr('id').split('.')
       if(!element.hasClass("star-yellow")){
            element.addClass('star-yellow')
       }
       
       $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
       $.ajax({
           url: "/rate",
           type: 'GET',
           data: {"rate": values[1],"profil_id": values[0]}
       })
       .done((data) => {
           console.log(data);
           if (data.status === 'ok') {
               let profil = $('#' + data.id)
               memoStars = []
               profil.children('div')
                   .removeClass('star-yellow')
                   .each(function (index, element) {
                       if (data.value > index) {
                           $(element).addClass('star-yellow')
                           memoStars.push(true);
                       }
                     else{  memoStars.push(false)}
                       console.log(memoStars)
                       console.log("ok")
                   })
                   .end()
                   .find('span.count-number')
                   .text('(' + data.count + ')')
               if(data.rate) {
                   if(data.rate == values[1]) {
                       title = '@lang("Vous avez déjà donné cette note !")'
                   } else {
                       title = '@lang("Votre vote a été modifié !")'
                   }
               } else {
                   title = '@lang("Merci pour votre vote !")'
               }
               swal({
                   title: title,
                   icon: 'warning'
               })
           } else {
               swal({
                   title: "@lang('Vous ne pouvez pas voter pour vos photos !')",
                   icon: 'error'
               })
           }
           element.removeClass('star-yellow')
       })
       .fail(() => {
           swallAlertServer()
           element.removeClass('star-yellow')
       })
})
$('.star-rating').hover(
    (e) => {
        memoStars = []
        $(e.currentTarget).children('div')
            .each((index, element) => {
                memoStars.push($(element).hasClass('star-yellow'))
            })
            .removeClass('star-yellow')
    }, (e) => {
    $.each(memoStars, (index, value) => {
        if(value) {
            $(e.currentTarget).children('div:eq(' + index + ')').addClass('star-yellow')
        }
    })
})

};

</script>

<style>
.star-rating div {
    display: inline-block;
    font-size:30px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    cursor: pointer;
  }
  .star-yellow,
  .star-rating div:hover,
  .star-rating div:hover div{
    color: red
  }

  .hover_img a { position:relative; }
  .hover_img a span { position:absolute; display:none; z-index:99; }
  .hover_img a:hover span { display:block; }
</style>

@endsection
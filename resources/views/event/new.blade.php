@extends('layouts.app')

@section('content')

 <!-- inner banner -->
 <div class="inner-banner " style="background: url('{{secure_asset('images/in2.jpg')}}') no-repeat top; background-size: cover;">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
            <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">Evènement</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Evènement</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->


<section >
        <div class="contact-top py-md-5">
            <div class="container">

            <div class="container ">
                <div class="waviy text-center">
                             <span style="--i:1">N</span>
                            <span style="--i:2">o</span>
                            <span style="--i:3">u</span>
                            <span style="--i:4">v</span>
                            <span style="--i:5">e</span>
                            <span style="--i:6">l</span>
                            <span style="--i:7"> </span>
                            <span style="--i:8"> </span>
                            <span style="--i:1">E</span>
                            <span style="--i:2">v</span>
                            <span style="--i:3">è</span>
                            <span style="--i:4">n</span>
                            <span style="--i:5">e</span>
                            <span style="--i:6">m</span>
                            <span style="--i:7">e</span>
                            <span style="--i:7">n</span>
                            <span style="--i:8">t</span>


                </div>


                    <div class="container-fluid mx-auto">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-7 col-lg-8 col-md-9">
                            <div class="card">
                                    <form class="form-card" method="POST" action="{{ route('create_event') }}" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class=" row" style="margin-top: 10px;">

                                                            <div class="col">
                                                            <label for="event_name" class="form-label text-md-right">{{ __('Nom de l \'évènement') }}</label>

                                                                <input id="event_name" type="text" class="form-control @error('naevent_nameme') is-invalid @enderror" name="event_name" value="{{ old('event_name') }}" required autocomplete="event_name" autofocus>

                                                                @error('event_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class=" row" style="margin-top: 10px;">

                                                            <div class="col">
                                                            <label for="event_description" class="form-label text-md-right">{{ __('Description') }}</label>

                                                                <textarea id="event_description" type="texterea" class="form-control @error('event_description') is-invalid @enderror" name="event_description" value="{{ old('event_description') }}" required autocomplete="event_description"></textarea> 
                                                                @error('event_description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class=" row"  style="margin-top: 10px;">

                                                            <div class="col">
                                                            <label for="zone" class="form-label text-md-right">{{ __('Localisation') }}</label>

                                                                <input id="zone" type="text" class="form-control @error('zone') is-invalid @enderror" name="zone" value="{{ old('zone') }}" required autocomplete="zone">

                                                                @error('zone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        
                                                        <div class="row"  style="margin-top: 10px;">

                                                            <div class="col col-md-6">
                                                                <label for="start_time" class="form-label text-md-right">{{ __('Date de début') }}</label>

                                                                <input id="start_time" type="datetime-local" class="form-control  @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}" required autocomplete="start_time">

                                                                @error('start_time')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col col-md-6">
                                                            <label for="end_time" class="form-label text-md-right">{{ __('Date de fin') }}</label>

                                                                <input id="end_time" type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}" required autocomplete="end_time">

                                                                @error('end_time')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="row" style="margin-top: 10px;">

                                                            <div class="col">
                                                            <label for="cover" class="form-label text-md-right">{{ __('Cover') }}</label>

                                                                <div class="custom-file">
                                                                    <input type="file" class="form control custom-file-input" id="customFileLang" lang="fr" name="cover" accept="image/png, image/jpeg ,image/jpg">
                                                                    <label class="custom-file-label" for="customFileLang">Sélectionner le fichier </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class=" row"  style="margin-top: 10px;">
                                                            <div class="col">
                                                            <label for="zone" class="form-label text-md-right">{{ __('categories:') }}</label>
                                                            <select class="form-control" name="categories" >
                                                                <option value="none" selected="" disabled="">Choisir un catégorie</option>
                                                                    @forelse ($categories as $cat)
                                                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                                    @empty
                                                                    @endforelse
                                                            </select>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="row" >
                                                            
                                                            <div class="col " style="float:left;margin-top:20px">
                                                                <button onclick="anim();" class="form-control col btn text-light" style="background-color:#f15000;width:100px;">
                                                                    {{ __('Créer') }}
                                                                </button>
                                                                <input type="submit" value="" hidden id="Submit">
                                                            </div>
                                                                
                                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
               

            </div>
        </div>
        </div>
    </section>

   
</div>
<style>

.card {
    padding: 30px 40px;
    margin-top: 60px;
    
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0px 0px 12px 12px #f15000
}

</style>
<script>
function anim(params) {
    let timerInterval
Swal.fire({
  title: 'Création de votre évènement',
  html: 'Dans quelques seconds <b></b> ...',
  timer: 5000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  
  willClose: () => {

    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
   
  }
})
}
</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    @endsection



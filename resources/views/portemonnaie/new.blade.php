@extends('layouts.app')

@section('content')

 <!-- inner banner -->
 <div class="inner-banner ">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">{{ Auth::user()->name }}</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Porte-Monnaie</li>
                </ul>
            </div>
        </section>
    </div>
    <!-- //inner banner -->

<div class="blog-section py-5" id="events">
        <div class="container py-md-5 py-4">
        @if (session()->has('message'))
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Message! </strong>{{ session('message') }}.
            </div>
        @endif
            <div class="waviy text-center mb-md-5 mb-4">
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
  <div class="container mt-5">
    <form action="{{ route('portemonnaie_ticket_create') }}" method="POST">
        @csrf
  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <!-- Credit card form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                <i class="fa fa-credit-card"></i>
                Carte de Credit
            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-mobile" class="nav-link rounded-pill">
                <i class="fa fa-paypal"></i>
                  Mobile Money
            </a>
          </li>

        </ul>
        <!-- End -->

        <!-- Credit card form content -->
        <div class="tab-content">
          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <!-- <p class="alert alert-success">Some text success or error</p> -->
            <form action="{{ route('portemonnaie_ticket_create') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="username">Nom Complet (sur la carte)</label>
                  <input type="text" name="username" id="username" placeholder="Jason Doe" class="form-control @error("username") is-invalid @enderror" value="{{ old('username') }}">
                  @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="cardNumber">Numéro de carte</label>
                <div class="input-group">
                  <input type="text" name="card_number" id="card_number" placeholder="Votre numero de carte" class="form-control @error("card_number") is-invalid @enderror" value="{{ old('card_number') }}">
                  <div class="input-group-append">
                    <span class="input-group-text text-muted">
                        <i class="fa fa-cc-visa mx-1"></i>
                        <i class="fa fa-cc-amex mx-1"></i>
                        <i class="fa fa-cc-mastercard mx-1"></i>
                    </span>
                  </div>
                @error('card_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label><span class="hidden-xs">Expiration</span></label>
                    <div class="input-group">
                      <input type="number" placeholder="MM" name="mm" id="mm" class="form-control @error('mm') is-invalid @enderror" value="{{ old('mm') }}">
                      @error('mm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      <input type="number" placeholder="YY" name="yy" id="yy" class="form-control @error("yy") is-invalid @enderror" value="{{ old('yy') }}" >
                      @error('yy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group mb-4">
                    <label data-toggle="tooltip" title="Les trois chiffres derriere votre carte">CVV
                        <i class="fa fa-question-circle"></i>
                    </label>
                    <input type="text" class="form-control @error("cvv") is-invalid @enderror" id="cvv" name="cvv" value="{{ old('cvv') }}">
                    @error('cvv')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirmer</button>
            </form>
          </div>
          <!-- End -->

          <!-- bank transfer info -->
          <div id="nav-tab-mobile" class="tab-pane fade">
          <h6>Détail de compte banquaire</h6>
            <dl>
              <dt>
                  <form action="{{ route('sale_ticket') }}" method="POST">
                      @csrf
                    <div class="form-group text-center">
                        <label>Votre numero de téléphone</label><br>
                      <p>
                          <input type="number" name="id" value={{$id}} hidden>
                          <input type="number" name="is_panier" value="{{$is_panier}}" hidden>
                          <input type="text" name="phone_number" value="+229 00 00 00 00">
                       </p>
                    </div>
                    <dd> <input type="submit" class="btn btn-success text-center" value="Acheter"> </dd>

                  </form>
                  </dt>
            </dl>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
          <!-- End -->
        </div>
        <!-- End -->
      </div>
    </div>
  </div>
  </form>
  </div>

  </div>
    </div>


<style>
    .rounded-lg {
  border-radius: 1rem;
}

.nav-pills .nav-link {
  color: #555;
}

.nav-pills .nav-link.active {
  color: #fff;
}
</style>

<script>

$('#advanced').flagStrap({
	buttonSize: "btn-lg",
	buttonType: "btn-primary",
	labelMargin: "20px",
	scrollable: false,
	scrollableHeight: "350px"
});
</script>

@endsection


@extends('layouts.app')

@section('content')


<div class="inner-banner "  style="background: url('{{ secure_asset('images/Org3.png')}}') no-repeat top; background-size: cover;">
        <section class="w3l-breadcrumb">
            <div class="container py-md-5 py-4">
                <h4 class="inner-text-title font-weight-bold text-white mb-sm-3 mb-2">{{ Auth::user()->name }}</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Evènement</li>
                </ul>
            </div>
        </section>
    </div>

    <section >
        <div class="contact-top py-md-5 py-4">
            <div class="container py-md-5 py-4">

            <div class="container">
            @if (session()->has('message'))
              <div class="alert alert-info">{{ session('message') }}</div>
        @endif
                <div class="waviy text-center mb-md-5 mb-4">
                            <span style="--i:1">A</span>
                            <span style="--i:2">j</span>
                            <span style="--i:3">o</span>
                            <span style="--i:4">u</span>
                            <span style="--i:5">t</span>
                            <span style="--i:6">e</span>
                            <span style="--i:7">r</span>
                            <span style="--i:8"> </span>
                            <span style="--i:1">D</span>
                            <span style="--i:2">e</span>
                            <span style="--i:3">s</span>
                            <span style="--i:3"></span>
                            <span style="--i:4">I</span>
                            <span style="--i:5">m</span>
                            <span style="--i:6">a</span>
                            <span style="--i:7">g</span>
                            <span style="--i:7">e</span>
                            <span style="--i:8">s</span>


                </div>


                <div class="container mt-5">
                    <form action="{{route('add_images')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview"> </div>
                        </div>            
                        <div class="custom-file">
                            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                        <input type="number" value="{{$id}}" name="event_id" hidden>
                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Upload Images
                        </button>
                    </form>
                </div>

            </div>
        </div>
</section>  
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).attr("width","25%").appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>

@endsection
@if($images!=null and count($images)>0)
<div class="container slide mt-100">
    <div class="row">
        <div class="col-md-8 mr-auto ml-auto">
            <div class="card card-raised card-carousel">
                <div id="carouselindicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <ol class="carousel-indicators">
                       @for($i=0;$i<=count($images);$i++ )
                            @if($i==0) 
                                <li data-target="#carouselindicators" data-slide-to="{{$i}}" class="active"></li>
                            @else
                                 <li data-target="#carouselindicators" data-slide-to="{{$i}}" class=""></li>
                            @endif
                        @endfor
                    </ol>
                    <div class="carousel-inner">

                        @foreach($images as $image)
                         @if($images[0]==$image)
                            <div class="carousel-item active carousel-item-left"> <img class="d-block w-100" src="{{asset('Upload/events/Images/'.$image)}}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4> <i class="fa fa-map-marker"></i> Premier Design  </h4>
                                </div>
                            </div>
                         @else
                           <div class="carousel-item carousel-item-left"> <img class="d-block w-100" src="{{asset('Upload/events/Images/'.$image)}}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4> <i class="fa fa-map-marker"></i> Premier Design  </h4>
                                </div>
                            </div>
                         @endif
                       @endforeach
                    </div> <a class="carousel-control-prev" href="#carouselindicators" role="button" data-slide="prev" data-abc="true"> <i class="fa fa-chevron-left"></i> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselindicators" role="button" data-slide="next" data-abc="true"> <i class="fa fa-chevron-right"></i> <span class="sr-only">Next</span> </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

<style>
    @import url(https://fonts.googleapis.com/css?family=Calibri:400,300,700);

.slide {
    vertical-align: middle;
    display: flex;
    font-family: 'Calibri', sans-serif !important;

}

.mt-100 {
    margin-top: 50px
}

.carousel .carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    text-indent: -99px;
    cursor: pointer;
    border: 1px solid #fff;
    background: #fff;
    border-radius: 2px
}
</style>

@extends('layout.master')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="h3">Tempat Olahraga</p>
                    <hr>
                    <div class="carousel slide" data-ride="carousel" id="carousel-property-image" style="-webkit-background-size: contain;background-size: contain;">
                        <ol class="carousel-indicators">
                            @foreach($property->images as $index=>$image)
                            <li data-target="#carousel-property-image" data-slide-to="{{$index}}" @if($index == 0) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($property->images as $index=>$image)
                                <div class="carousel-item @if($index == 0) active @endif">
                                    <img class="d-block w-100" src="{{$image->name}}" alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-property-image" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-property-image" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layout.master')

@section('jumbotron')

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center mt-5 text-white">Cari Tempat Olahraga?</h1>
            <p class="text-center text-white">Dapatkan info tempat olahraga murah, bagus dan berkualitas hanya di Fitgo!</p>

            <div class="form-group has-search">
                <i class="fa fa-search form-control-feedback"></i>
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </div>
    </div>
@endsection


@section('container')
    <div class="row justify-content-center">
        @foreach($properties as $property)
            <div class="card" style="width: 23rem;">
                <img class="card-img-top" src="{{ asset('images/properties/'.$property->images()->first()->name) }}" alt="Card image cap" width="100" height="250">
                <div class="card-body">
                    <p class="card-title">
                    <div class="row">
                        <div class="col-md-7">
                            {{ $property->name }}
                        </div>
                        <div class="col-md-5">
                            <span class="star">
                                <div class="star-wrap">
                                    <span class="star-active" style="width:{{ count($property->ratings) == 0 ? '0' : ($property->ratings->sum('number') / count($property->ratings))*20 }}%">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="star-inactive">
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </span>
                        </div>
                    </div>
                    </p>
                    <p class="card-title">
                        {{ $property->address }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            // Transition effect for navbar

            $('nav').toggleClass('fixed-top');
            $('nav').removeClass('bg-primary');

            $(window).scroll(function() {
                // checks if window is scrolled more than 500px, adds/removes solid class
                $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
            });
        });
    </script>
@endsection

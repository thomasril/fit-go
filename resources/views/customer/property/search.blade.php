@extends('layout.master')

@section('container')

    <div class="card">
        <div class = "card-header">
            <h5 class = "card-title">Filter</h5>
        </div>

        <div class="card-body">
            <input type="checkbox"> Futsal
        </div>
    </div>

    <div class = "row">
        <div class = "col-lg-8 col-md-8 col-sm-6">
            <div class = "mt-2">
                Map
            </div>

            <div class="card mt-4"  style="display: inline-block;width: 49%;">
                <img class="card-img-top" src="https://asset.kompas.com/crop/0x39:1000x705/750x500/data/photo/2019/02/01/666564806.jpeg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-title">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>

            <div class="card mt-4" style="display: inline-block;width: 49%;">
                <img class="card-img-top" src="https://asset.kompas.com/crop/0x39:1000x705/750x500/data/photo/2019/02/01/666564806.jpeg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-title">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class = "col-lg-4 col-md-4 col-sm-6 mt-5">
            <div class = "card">
                <div class = "card-header">
                    <h5 class = "card-title">Sponsored</h5>
                </div>
                <div class = "card-body">
                    <div class = "row">
                        <div class = "col-lg-12">
                            <div class = "row">
                                <div class = "col-lg-12"><img src = "https://asset.kompas.com/crop/0x39:1000x705/750x500/data/photo/2019/02/01/666564806.jpeg" style="width: 100%;"></div>
                                <div class = "col-lg-8 mt-2">Nama Tempat</div>
                                <div class = "col-lg-4 mt-2">Rating</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection

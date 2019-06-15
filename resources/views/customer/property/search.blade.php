@extends('layout.master')

@section('container')
    <div class="card">
        <div class = "card-header">
            <h5 class = "card-title">Filter</h5>
        </div>

        <div class="card-body">
            <form>
                <input type="hidden" name="longitude" value="{{request()->longitude}}">
                <input type="hidden" name="latitude" value="{{request()->latitude}}">
                <div class="form-group">
                    <label>Cari</label>
                    <input type="text" name="search" class="form-control" value="{{request()->search}}">
                </div>
                <div class="form-group">
                    <label>Jenis Olahraga</label>
                    <div class="row">
                        @foreach(\App\MasterSport::all() as $masterSport)
                            <div class="col-3">
                                <input type="checkbox" name="filter[]" id="master-sport-{{$masterSport->id}}" value="{{$masterSport->id}}" @if(request()->filter && in_array($masterSport->id, request()->filter)) checked @endif>
                                <label for="master-sport-{{$masterSport->id}}">{{$masterSport->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class = "row">
        <div class = "col-lg-8 col-md-8 col-sm-6">
            @if(count($properties) == 0)
                <div class="mt-2">
                    <p class="h4">Lokasi Olahraga Tidak Ditemukan</p>
                </div>
            @else
                <div class = "mt-2">
                    <label>Tempat Olahraga Sekitar Anda</label>
                    <div style="height: 300px; border: 1px solid;">
                        @include('map.view-many', [
                            'data' => $properties
                        ])
                    </div>
                </div>
                @foreach($properties as $property)
                <a class="card mt-4"  style="display: inline-block;width: 49%;" href="{{route('propetyDetailForCustomer', ['id' => $property->id])}}" >
                    <img class="card-img-top" src="{{$property->images()->first()->name}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title">{{$property->name}}</p>
                    </div>
                </a>
                @endforeach
            @endif
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

@section('script')
<script>
    $(function() {
    }());
</script>
@endsection

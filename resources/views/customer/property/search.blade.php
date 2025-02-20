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
                    <div class="form-row">
                        <div class="col-12">Tanggal</div>
                    </div>
                    <div class="form-row">
                        <div class="col-12"><input type="date" name="date" class="form-control" value="{{request()->date}}"></div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">Jam Mulai</div>
                        <div class="col-6">Jam Selesai</div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <input type="time" name="start" class="form-control" value="{{request()->start}}">
                        </div>
                        <div class="col-6">
                            <input type="time" name="end" class="form-control" value="{{request()->end}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class = "row mb-5">
        <div class = "col-lg-12">
            @if(count($properties) == 0)
                <div class="mt-5">
                    <p class="h4">Lokasi Olahraga Tidak Ditemukan</p>
                </div>
            @else
                <div class = "mt-5">
                    <label>Tempat Olahraga Sekitar Anda</label>
                    <div style="height: 300px; border: 1px solid;">
                        @include('map.view-many', [
                            'data' => $properties
                        ])
                    </div>
                </div>
                @foreach($properties as $property)
                <a class="card mt-4"  style="display: inline-block;width: 49%;text-decoration: none; color: black" href="{{route('propetyDetailForCustomer', ['id' => $property->id])}}" >
                    <img class="card-img-top" src="{{ asset('images/properties/'.$property->images()->first()->name) }}" alt="Card image cap" width="100" height="250">
                    <div class="card-body">
                        <p class="card-title">
                            <div class="row">
                                <div class="col-md-7">
                                    {{ $property->name }}
                                </div>
                                <div class="col-md-5">
                                        <span class="star mt-1">
                                            <div class="star-wrap">
                                                <span class="star-active" style="width: {{ count($property->ratings) == 0 ? '0' : ($property->ratings->sum('number') / count($property->ratings))*20 }}%">
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
                        <div>
                            {{round($property->distance, 2)}} km
                        </div>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('script')
<script>
    $(function() {
    }());
</script>
@endsection

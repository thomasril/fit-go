@extends('layout.master')

@section('container')
    <div class = "row mb-5">
        <div class = "col-lg-8">
            <div class="card">
                <img class="card-img-top" style="width: 100%" src="https://asset.kompas.com/crop/0x39:1000x705/750x500/data/photo/2019/02/01/666564806.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{$property->name}}</h3>
                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Deskripsi</h5>
                </div>

                <div class="card-body">
                    <div class = "row">
                        <div class = "col-lg-4"><strong>Nomor Telepon</strong></div>
                        <div class = "col-lg-4"><strong>Alamat</strong></div>
                        <div class = "col-lg-4"><strong>Jam Buka</strong></div>
                    </div>

                    <div class = "row">
                        <div class = "col-lg-4">{{$property->user->phone_number}}</div>
                        <div class = "col-lg-4">{{$property->address}}</div>
                        <div class = "col-lg-4">{{$property->open_hour}} - {{$property->close_hour}}</div>
                    </div>

                    <div class ="row mt-3">
                        <div class = "col-lg-12">
                            <strong>Deskripsi</strong>
                        </div>

                        <div class = "col-lg-12">
                            {{$property->address}}
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <strong>Fasilitas yang Tersedia</strong>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                @foreach($property->facilities as $facility)
                                    <li>{{$facility->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Lokasi</h5>
                </div>
                <div class="card-body">
                    <div style="height: 200px">
                        @include('map.view-one', [
                            'data' => $property
                        ])
                    </div>
                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Olahraga yang Tersedia</h5>
                </div>
                <div class="card-body">
                    @foreach($property->sports as $sport)
                    <div class ="row mt-3">
                        <div class = "col-lg-12">
                            <strong>{{$sport->masterSport->name}}</strong>
                        </div>
                        @if($sport->masterSport->bookable)
                        <div class = "col-lg-12">
                            <strong>Jumlah Lapangan: </strong> {{$sport->fields()->count()}}
                        </div>
                        <div class="col-lg-12">
                            @if($sport->price > 0)
                            <strong>Deposit: </strong> {{$sport->price}}
                            @else
                            <strong>Tidak ada deposit</strong>
                            @endif
                        </div>
                        @else
                            <div class="col-lg-12">
                                <strong>Tidak Perlu Booking</strong>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            Harga:
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="col-6">Harga</th>
                                    <th class="col-6">Satuan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sport->prices as $price)
                                <tr>
                                    <td>{{$price->number}}</td>
                                    <td>per {{$price->name}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Jadwal dan Booking</h5>
                </div>
                <div class="card-body">
                    <a href="{{route('bookForCustomer', ['id' => $property->id])}}">
                        <button class="btn btn-primary">Booking</button>
                    </a>
                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Foto</h5>
                </div>

                <div class="card-body">

                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Tulis Ulasan</h5>
                </div>
                <div class="card-body">
                    <input type = "text" class = "form-control" placeholder="Tulis ulasan untuk Gor Anjay">
                    <button class = "btn btn-primary">Kirim Ulasan</button>
                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Ulasan</h5>
                </div>
                <div class="card-body">
                    <div class = "row">
                        <div class = "col-lg-2">
                            <img class = "profile-picture">
                        </div>

                        <div class = "col-lg-10">
                            <div class = "row">
                                <div class = "col"><strong>Nama Pengulas</strong></div>
                            </div>
                            <div class = "row mt-3">
                                <div class = "col">Tanggal Pengulas</div>
                            </div>
                        </div>
                    </div>

                    <div class = "row mt-2">
                        <div class = "col">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aliquid, culpa et excepturi ipsam ipsum maiores, maxime, non quidem suscipit veniam voluptatem voluptates. Animi est fuga necessitatibus tempora voluptates.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "col-lg-4">
            <div class = "card">
                <div class = "card-header">
                    <h5 class="card-title">Tempat Olahraga Sekitar</h5>
                </div>
                <div class="card-body">
                    <div class = "row mt-3">
                        <div class = "col-lg-2"><img src = "https://asset.kompas.com/crop/0x39:1000x705/750x500/data/photo/2019/02/01/666564806.jpeg" style="width: 100%;"></div>
                        <div class = "col-lg-7">Nama Tempat</div>
                        <div class = "col-lg-3">Rating</div>
                    </div>
                </div>
            </div>

            <div class = "card mt-4">
                <div class = "card-header">
                    <h5 class="card-title">Tempat Olahraga Terakhir Dilihat</h5>
                </div>
                <div class="card-body">
                    <div class = "row">
                        <div class = "col-lg-2"><img src = "https://asset.kompas.com/crop/0x39:1000x705/750x500/data/photo/2019/02/01/666564806.jpeg" style="width: 100%;"></div>
                        <div class = "col-lg-7">Nama Tempat</div>
                        <div class = "col-lg-3">Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

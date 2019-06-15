@extends('layout.master')

@section('container')
    <div class = "row">
        <div class = "col-lg-8">
            <div class="card">
                <img class="card-img-top" style="width: 100%" src="https://asset.kompas.com/crop/0x39:1000x705/750x500/data/photo/2019/02/01/666564806.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">Gor Anjay</h3>
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
                        <div class = "col-lg-4">021-562189</div>
                        <div class = "col-lg-4">Jln Ayam 123</div>
                        <div class = "col-lg-4">09.00 - 18.00</div>
                    </div>

                    <div class ="row mt-3">
                        <div class = "col-lg-12">
                            <strong>Deskripsi</strong>
                        </div>

                        <div class = "col-lg-12">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias earum eveniet ipsam magni maiores nisi optio possimus sed sequi, ut. Culpa fugit iure optio pariatur quibusdam repellat temporibus voluptas voluptatibus!
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5 mb-2">
                <div class = "card-header">
                    <h5 class = "card-title">Jadwal dan Booking</h5>
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

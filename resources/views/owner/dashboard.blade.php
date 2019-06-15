@extends('layout.master')

@section('container')
    <h4>Dashboard</h4>

    <div class = "row mb-5">
        <div class = "col-lg-6 col-md-6 col-sm-12">
            <div class = "card mt-3">
                <div class = "card-header">
                    <h5 class="card-title">Pemesanan Lapangan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pembeli</th>
                            <th scope="col">No Lap</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Akhir</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>1</td>
                            <td>2019-08-10</td>
                            <td>18:00</td>
                            <td>19:00</td>
                            <td>
                                <button class = "btn btn-danger btn-icon"><i class="fa fa-times"></i></button>
                                <button class = "btn btn-info btn-icon"><i class="fa fa-check"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class = "card mt-3">
                <div class = "card-header">
                    <h5 class="card-title">Pemesanan Manual</h5>
                </div>
                <div class="card-body">
                    Booking starts here
                </div>
            </div>

            <div class = "card mt-3">
                <div class = "card-header">
                    <h5 class="card-title">Berlangganan</h5>
                </div>
                <div class="card-body">
                    <div class = "row">
                        <div class = "col-lg-12">
                            Anda masih berlangganan sampai tanggal <strong>12 Juni 2020</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "col-lg-6 col-md-6 col-sm-12">
            <div class = "card mt-3">
                <div class = "card-header">
                    <h5 class="card-title">Properti</h5>
                </div>
                <div class="card-body">
                    <table class = "table">
                        <tr>
                            <td width="30%">lokasi</td>
                            <td width="5%">:</td>
                            <td>Jln Salak</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>021-5637951</td>
                        </tr>
                        <tr>
                            <td>Jam Operasional</td>
                            <td>:</td>
                            <td>09.00 - 17.00</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Pending</td>
                        </tr>

                        <tr>
                            <td>Lapangan</td>
                            <td>:</td>
                            <td>Sepakbola, Badminton</td>
                        </tr>
                    </table>

                    <button class = "btn btn-primary">Update</button>
                </div>
            </div>

            <div class = "card mt-3">
                <div class = "card-header">
                    <h5 class="card-title">Fasilitas</h5>
                </div>
                <div class="card-body">
                    <div>Tipe Olahraga:</div>
                    <select class = "form-control mt-2">
                         <option>Sepakbola</option>
                         <option>Badminton</option>
                    </select>

                </div>
            </div>
        </div>
    </div>
@endsection

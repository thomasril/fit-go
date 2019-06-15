@extends('layout.master')

@section('container')
    <h4>Dashboard</h4>

    <div class = "row mb-5">
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
        </div>
        <div class = "col-lg-6 col-md-6 col-sm-12">
            <div class = "card mt-3">
                <div class = "card-header">
                    <h5 class="card-title">Metode Pembayaran</h5>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class = "table">
                            <thead>
                            <tr>
                                <th>Pembayaran</th>
                                <th>Nama Bank</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Debit</td>
                                <td>BCA (Bank Cina Asia)</td>
                                <td>
                                    <a href="">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
    </div>
@endsection

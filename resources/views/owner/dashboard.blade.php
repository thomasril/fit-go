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
                            <td width="30%">Nama</td>
                            <td width="5%">:</td>
                            <td>{{ $property->name }}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td>{{ $property->description ? $property->description : '-' }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $property->address }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>:</td>
                            <td>
                                <div style="width:100%; height: 200px;">
                                    @include('map.view-one',[
                                        'data' => $property
                                    ])
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jam Operasional</td>
                            <td>:</td>
                            <td>{{ $property->open_hour }} - {{ $property->close_hour }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td style="color: {{ $property->status == "Pending" ? 'orange' : 'green' }}">{{ $property->status }}</td>
                        </tr>
                    </table>

                    <div class="col-md-12 text-center">
                        <a href="{{ url('/property/update/'.$property->id) }}">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </a>
                    </div>
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
                                @foreach($property->payments as $payment)
                                    <tr>
                                        <td>{{ $payment->method }}</td>
                                        <td>{{ $payment->bank_id == 1 ? '-' : $payment->bank->name }}</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#modal-update-payment-{{ $payment->id }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ url('/payment/delete/'.$payment->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <div class="modal fade" id="modal-update-payment-{{ $payment->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{ url('/payment/update') }}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Metode Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="{{ $payment->id }}">
                                                            <div class = "form-group">
                                                                <label for="">Metode Pembayaran</label>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="radio" name="pay_method" value="Cash" @if($payment->method == "Cash") checked @endif onclick="return cash()"> Tunai
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="radio" name="pay_method" value="Transfer" @if($payment->method == "Transfer") checked @endif onclick="return transfer()"> Transfer
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "form-group">
                                                                <label for="">Bank</label>
                                                                <select name="bank_id" class="form-control" id="bank" @if($payment->method == "Cash") disabled @endif>
                                                                    @foreach($banks as $bank)
                                                                        <option value="{{ $bank->id }}" @if($payment->bank_id == $bank->id) selected @endif>{{ $bank->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class = "form-group">
                                                                <label for="">Nama Akun Bank</label>
                                                                <input type="text" class="form-control" name="account_name" id="account_name" @if($payment->method == "Cash") disabled @endif value="{{ $payment->account_name == null ? '' : $payment->account_name}}">
                                                            </div>
                                                            <div class = "form-group">
                                                                <label for="">Nomor Akun Bank</label>
                                                                <input type="text" class="form-control" name="account_number" id="account_number" @if($payment->method == "Cash") disabled @endif value="{{ $payment->account_number == null ? '' : $payment->account_number  }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="col-md-12 text-center">
                            <button type = "button" class = "btn btn-primary" data-toggle="modal" data-target="#modal-insert">Tambah</button>
                        </div>

                        <div class="modal fade" id="modal-insert" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="{{ url('/payment/insert') }}">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Metode Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                                            <div class = "form-group">
                                                <label for="">Metode Pembayaran</label>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="radio" name="pay_method" value="Cash" checked onclick="return cash()"> Tunai
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="radio" name="pay_method" value="Transfer" onclick="return transfer()"> Transfer
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "form-group">
                                                <label for="">Bank</label>
                                                <select name="bank_id" class="form-control" id="bank" disabled>
                                                    @foreach($banks as $bank)
                                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class = "form-group">
                                                <label for="">Nama Akun Bank</label>
                                                <input type="text" class="form-control" name="account_name" id="account_name" disabled>
                                            </div>
                                            <div class = "form-group">
                                                <label for="">Nomor Akun Bank</label>
                                                <input type="text" class="form-control" name="account_number" id="account_number" disabled>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($property->status != "Pending")
                <div class = "card mt-3">
                    <div class = "card-header">
                        <h5 class="card-title">Berlangganan</h5>
                    </div>
                    <div class="card-body">
                        <div class = "row">
                            <div class = "col-lg-12">
                                @if(count(Auth::user()->subscriptions) == 0 || Auth::user()->subscriptions()->orderBy('end_date', 'desc')->first()->end_date < date('Y-m-d'))
                                    Berlangganan dengan harga perbulan hanya Rp. 99.999,-
                                    <form method="post" action="{{ url('/subscription') }}" class="row mt-4">
                                        <div class="form-group col-lg-10">
                                            <input type="number" class="form-control" name="month" min="1" value="1">
                                        </div>
                                        <div class="col-lg-2 mt-2">Bulan</div>
                                        <div class="form-group col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary">Berlangganan</button>
                                        </div>
                                    </form>
                                @else
                                    Anda berlangganan sampai tanggal <strong>{{ date('d F Y', strtotime(Auth::user()->subscriptions()->orderBy('end_date', 'desc')->first()->end_date)) }}</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        function cash(){
            $('#bank').val('1');
            $('#account_name').val('');
            $('#account_number').val('');
            $('#bank').prop( "disabled", true );
            $('#account_name').prop( "disabled", true );
            $('#account_number').prop( "disabled", true );
        }

        function transfer(){
            $('#bank').prop( "disabled", false );
            $('#account_name').prop( "disabled", false );
            $('#account_number').prop( "disabled", false );
        }
    </script>
@endsection


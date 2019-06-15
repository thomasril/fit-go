@extends('layout.master')

@section('container')
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class = "table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Tempat</th>
                        <th>Nama Pemilik</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Jam Buka</th>
                        <th>Jam Tutup</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->user->name}}</td>
                            <td>{{$p->description}}</td>
                            <td>{{$p->address}}</td>
                            <td>{{$p->open_hour}}</td>
                            <td>{{$p->close_hour}}</td>
                            <td>{{$p->status}}</td>
                            <td>
                                <a href="{{ url('/admin/property/approve/'.$p->id) }}">
                                    <i class = "fa fa-check"></i>
                                </a>

                                <a href="{{ url('/admin/property/reject/'.$p->id) }}">
                                    <i class = "fa fa-times"></i>
                                </a>

                                <a href="{{ url('/admin/property/ban/'.$p->id) }}">
                                    <i class = "fa fa-ban"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

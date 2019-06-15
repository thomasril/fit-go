@extends('layout.master')

@section('container')
    @csrf
    <div class="col-lg-12">
        <div class = "card">
            <div class = "card-body">
                <table class = "table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Bank</th>
                        <th>Bisa dibook</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sports as $s)
                        <tr>
                            <td>{{$s->id}}</td>
                            <td>{{$s->name}}</td>
                            <td>{{($s->bookable == 0) ? 'Tidak' : 'Ya'}}</td>
                            <td>
                                <a href = "" data-toggle="modal" data-target="#modal-update-sport-{{ $s->id }}">
                                    <i class = "fa fa-edit mr-2"></i>
                                </a>
                                <a href="{{ url('/admin/sport/delete/'.$s->id) }}">
                                    <i class = "fa fa-trash"></i>
                                </a>
                            </td>

                            <div class="modal fade" id="modal-update-sport-{{ $s->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{ url('/admin/sport/update') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Olarga</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="{{ $s->id }}">
                                                <div class = "form-group">
                                                    <label for="">Nama Olahraga</label>
                                                    <input type="text" class="form-control" name="name" id="account_name">
                                                </div>

                                                <div class = "form-group">
                                                    <div>Dapat dibooking?</div>
                                                    <input type = "radio" name = "bookable" value = "1">Ya
                                                    <input type = "radio" name = "bookable" value = "0" class = "ml-3">Tidak
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
            </div>
        </div>
    </div>

    <div class = "col-lg-12 mt-3 ">
        <div class = "card">
            <div class = "card-body">
                <form method="post" action="/admin/sport/insert">
                    {{csrf_field()}}
                    <div class="form-group border-bottom">
                        <p class="h4">Tambah Olahraga Baru</p>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Olahraga:</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class = "form-group">
                        <div for="">Dapat dibooking?</div>
                        <input type = "radio" name = "bookable" value = "1">Ya
                        <input type = "radio" name = "bookable" value = "0" class = "ml-5">Tidak
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

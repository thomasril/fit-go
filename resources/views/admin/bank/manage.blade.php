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
                            <th>Nama Bank</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banks as $b)
                            <tr>
                                <td>{{$b->id}}</td>
                                <td>{{$b->name}}</td>
                                <td>
                                    <a href = "" data-toggle="modal" data-target="#modal-update-bank-{{ $b->id }}">
                                        <i class = "fa fa-edit mr-2"></i>
                                    </a>
                                    <a href="{{ url('/admin/bank/delete/'.$b->id) }}">
                                        <i class = "fa fa-trash"></i>
                                    </a>
                                </td>

                                <div class="modal fade" id="modal-update-bank-{{ $b->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="{{ url('/admin/bank/update') }}">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Bank</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $b->id }}">
                                                    <div class = "form-group">
                                                        <label for="">Nama Bank</label>
                                                        <input type="text" class="form-control" name="name" id="account_name">
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

        <div class = "col-lg-12 mt-3">
            <div class = "card">
                <div class = "card-body">
                    <form method="post" action="/admin/bank/insert">
                        {{csrf_field()}}
                        <div class="form-group mt-3 border-bottom">
                            <p class="h4">Tambah Bank Baru</p>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Bank:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

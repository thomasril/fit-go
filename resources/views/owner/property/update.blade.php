@extends('layout.master')

@section('container')
    <form method="post" class="row" enctype="multipart/form-data" action="{{ url('/property/update') }}">
        @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <p class="h4">Ubah Tempat Olahraga</p>
                    </div>
                    <hr>
                    <input type="hidden" value="{{ $property->id }}" name="id">
                    <div class="form-group">
                        <label for="">Nama Tempat</label>
                        <input type="text" name="name" class="form-control" value="{{ $property->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" class="form-control" value="{{ $property->description }}">{{ $property->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Masukkan Gambar</label>
                        <input type="file" multiple name="image[]" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Jam Buka</label>
                        <input type="time" class="form-control" name="open_hour" value="{{ $property->open_hour }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Tutup</label>
                        <input type="time" class="form-control" name="close_hour" value="{{ $property->close_hour }}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="address" class="form-control" value="{{ $property->address }}">{{ $property->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih lokasi sesuai peta</label>
                        <div style="height: 300px; border: 1px solid;">
                            @include('map.edit', [
                                'data' => $property
                            ])
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-12 text-center">
                <button class="btn btn-primary">Ubah</button>
            </div>
        </div>
    </form>
@endsection
@extends('layout.master')

@section('container')
    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Daftar Sebagai : </label>
                            <select name="role_id" class="form-control" required>
                                <option value="2">Pemilik Tempat Olahraga</option>
                                <option value="3">Pencari Tempat Olahraga</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Kata Sandi</label>
                            <input type="password" name="confirm" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

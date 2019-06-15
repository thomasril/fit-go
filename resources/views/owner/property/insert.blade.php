@extends('layout.master')

@section('container')
    <form method="post" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Tempat</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Masukkan Gambar</label>
                        <input type="file" multiple name="image[]" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Jam Buka</label>
                        <input type="time" class="form-control" name="open_hour">
                    </div>
                    <div class="form-group">
                        <label for="">Jam Tutup</label>
                        <input type="time" class="form-control" name="close_hour">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih lokasi sesuai peta</label>
                        <div style="height: 300px; border: 1px solid;">
                            @include('map.set')
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="btn btn-primary" id="add-facility-button">Tambah Fasilitas</div>
                    <hr>
                    <div id="facility-container"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="btn btn-primary" id="add-sport-button">Tambah Jenis Olahraga</div>
                    <hr>
                    <div id="sport-container">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Insert</button>
            </div>
        </div>
    </form>
    <script type="text/html" id="facility-input-template">
        <div class="form-group">
            <div class="form-row">
                <div class="col-3">
                    <input type="text" name="facility[]" class="form-control">
                </div>
                <div class="col-3">
                    <div class="btn btn-danger delete-facility-btn">Hapus</div>
                </div>
            </div>
        </div>
    </script>
    <script type="text/html" id="sport-template">
        <div class="sport">
            <input type="hidden" name="sportid[]" class="sportid">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-6">
                        <label for="">Jenis Olahraga</label>
                        <select name="sport[]" class="form-control">
                            <option value="Futsal">Futsal</option>
                            <option value="Basket">Basket</option>
                            <option value="Kelereng">Kelereng</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="">Jumlah Lapangan</label>
                        <input type="number" name="field[]" class="form-control">
                    </div>
                    <div class="col-2">
                        <div class="btn btn-danger delete-sport-button" style="margin-top: 40px;">Hapus</div>
                    </div>
                </div>
                <br>
                <div class="btn btn-primary add-price-btn" data-id="">Tambah Harga</div>
                <br>
                <div class="form-row">
                    <div class="col-6">
                        <label for="">Harga</label>
                    </div>
                    <div class="col-2" style="text-align: center">
                    </div>
                    <div class="col-2">
                        <label for="">Satuan</label>
                    </div>
                </div>
                <div class="price-container">

                </div>
            </div>
            <hr>
        </div>
    </script>
    <script type="text/html" id="price-template">
        <div class="form-group">
            <div class="form-row">
                <div class="col-6">
                    <input type="number" name="price[]" class="form-control sport-price">
                </div>
                <div class="col-2" style="text-align: center">
                    <label>Per</label>
                </div>
                <div class="col-2">
                    <input type="text" name="unit[]" class="form-control sport-price-type">
                </div>
                <div class="col-2">
                    <div class="btn btn-danger delete-price-btn">Hapus</div>
                </div>
            </div>
        </div>
    </script>
@endsection

@section('script')
        $(function() {
            var id = 1;
            $facilityInputTemplate = $($('#facility-input-template').html());
            $facilityInputTemplate.find('.delete-facility-btn').click(function(e) {
                $(this).closest('.form-group').remove();
            });
            $('#add-facility-button').click(function() {
                $('#facility-container').append($facilityInputTemplate.clone(true));
            });

            $sportTemplate = $($('#sport-template').html());
            $sportTemplate.find('.delete-sport-button').click(function(e) {
                $(this).closest('.sport').remove();
            });
            $priceTemplate = $($('#price-template').html());
            $priceTemplate.find('.delete-price-btn').click(function(e) {
                $(this).closest('.form-group').remove();
            });
            $sportTemplate.find('.add-price-btn').click(function(e) {
                $temp = $priceTemplate.clone(true);
                var currentId = $(this).data('id');
                $temp.find('.sport-price').attr('name', `price[${currentId}][]`);
                $temp.find('.sport-price-type').attr('name', `unit[${currentId}][]`);
                $(this).parent().find('.price-container').append($temp)
            });
            $('#add-sport-button').click(function() {
                $temp = $sportTemplate.clone(true);
                $temp.find('.sportid').val(id);
                $temp.find('.add-price-btn').attr('data-id', id);
                id++;
                $('#sport-container').append($temp);
            });
        }());
@endsection

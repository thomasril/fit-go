@extends('layout.master')

@section('container')
    <style>
        .schedule-available {
            background-color: green;
            width:100%;
            height: 20px;
            cursor: pointer;
        }
        .schedule-not-available {
            background-color: red;
            width:100%;
            height: 20px;
            cursor: pointer;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <form action="{{route('api::schedule')}}" method="get" class="filter-schedule-form">
                <p class="h3">Jadwal</p>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-M-d')}}">
                </div>
                <div class="form-group">
                    <label>Jenis Olahraga</label>
                    <select name="sportid" id="" class="form-control">
                        @foreach($property->sports as $sport)
                            <option value="{{$sport->id}}">{{$sport->masterSport->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Tampilkan</button>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" style="font-size:12px;">
                        <thead>
                        <tr id="schedule-header"></tr>
                        </thead>
                        <tbody id="schedule-content">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" role="dialog" id="customer-order-modal">
        <div class="modal-dialog" role="document">
            <form action="{{route('api::schedule')}}" method="post">
                @csrf
                <input type="hidden" name="time">
                <input type="hidden" name="field">
                <input type="hidden" name="date">
                <div class="modal-content">
                    <div class="model-header">
                        <h5 class="modal-title">Pesan Sekarang!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-action">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Pesan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" role="dialog" id="owner-add-modal">
            <div class="modal-dialog" role="document">
                <form action="{{route('api::schedule')}}" method="post">
                    @csrf
                    <input type="hidden" name="time">
                    <input type="hidden" name="field">
                    <input type="hidden" name="date">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambahkan ke Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Masukkan Nama Pemesan:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <div class="modal" role="dialog" tabindex="-1" id="owner-remove-book">
        <div class="modal-dialog" role="document">
            <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda ingin menghapus jadwal ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/html" id="schedule-template">
        <tr class="schedule-field"></tr>
    </script>
@endsection

@section('script')
<script>
    $(function() {
        $('.filter-schedule-form').submit(function(e) {
            e.preventDefault();
            $scheduleTemplate = $($('#schedule-template').html());
            $.ajax({
                url: '{{route('api::schedule')}}?' + $(this).serialize(),
                type: 'get',
                success: function(data) {
                    var header = data.header;
                    $header = $('#schedule-header');
                    $header.html('');
                    $header.append(`<th>No.</th>`);
                    header.forEach(function(val, key) {
                        $header.append(`<th>${val}</th>`);
                    });
                    var schedule = data.schedule;
                    $content = $('#schedule-content');
                    $content.html('');
                    schedule.forEach(function(val, key) {
                        $tr = $scheduleTemplate.clone();
                        $tr.append(`<td>${key+1}</td>`);
                        val.forEach(function(val2, key2) {
                            if(val2.booked) {
                                $tr.append(`<td><div class="schedule-not-available" data-id="${val2.data.id}"></div></td>`)
                            } else {
                                $tr.append(`<td><div class="schedule-available" data-time="${val2.time}" data-field="${val2.field.id}" data-date="${data.date}"></div></td>`)
                            }
                        });
                        $content.append($tr);
                    });
                    @if(Auth::user()->role->name == "Owner")
                        $('.schedule-available').click(function() {
                            $modal = $('#owner-add-modal');
                            $modal.find('input[name=time]').val($(this).data('time'));
                            $modal.find('input[name=date]').val($(this).data('date'));
                            $modal.find('input[name=field]').val($(this).data('field'));
                            $modal.modal('show');
                        });
                        $('.schedule-not-available').click(function() {
                            $modal = $('#owner-remove-book');
                            $modal.find('form').attr('action', `/api/schedule/delete/${$(this).data('id')}`);
                            $modal.modal('show');
                        });
                    @elseif(Auth::user()->role->name == "Customer")
                        $('.schedule-available').click(function() {
                            $modal = $('#customer-order-modal');
                            $modal.find('input[name=time]').val($(this).data('time'));
                            $modal.find('input[name=date]').val($(this).data('date'));
                            $modal.find('input[name=field]').val($(this).data('field'));
                            $modal.modal('show');
                        });
                    @endif

                }
            });
        });
        $('#owner-add-modal').find('form').submit(function(e) {
            e.preventDefault();
            $form = $(this);
            $.ajax({
                url: $form.attr('action'),
                type: 'post',
                data: $form.serialize(),
                success: function(data) {
                    $('#owner-add-modal').modal('hide');
                    $('.filter-schedule-form').submit();
                }
            });
        });
        $('#owner-remove-book').find('form').submit(function(e) {
            e.preventDefault();
            $form = $(this);
            $.ajax({
                url: $form.attr('action'),
                type: 'post',
                success: function(data) {
                    $('#owner-remove-book').modal('hide');
                    $('.filter-schedule-form').submit();
                }
            });
        });
    }());
</script>
@endsection
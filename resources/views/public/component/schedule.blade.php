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
                        <tr id="schedule-header">

                        </tr>
                        </thead>
                        <tbody id="schedule-content">
                        </tbody>
                    </table>
                </div>
            </div>
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
            console.log('{{route('api::schedule')}}?' + $(this).serialize());
            $.ajax({
                url: '{{route('api::schedule')}}?' + $(this).serialize(),
                method: 'get',
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
                                $tr.append(`<td><div class="schedule-not-available"></div></td>`)
                            } else {
                                $tr.append(`<td><div class="schedule-available"></div></td>`)
                            }
                        });
                        $content.append($tr);
                    });
                }
            });
        });
    }());

</script>
@endsection
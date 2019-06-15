@extends('layout.master')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="h3">Histori booking lapangan olahraga</p>
                    <hr>
                    @foreach($schedules as $schedule)
                    <div class="history">
                        <div>
                            <strong class="h5">{{$schedule->field->sport->property->name}}</strong>
                        </div>
                        <div class="row">
                            <div class="col-2">Tanggal:</div>
                            <div class="col-10">{{$schedule->date}}</div>
                        </div>
                        <div class="row">
                            <div class="col-2">Jam:</div>
                            <div class="col-10">{{date('H:i', strtotime($schedule->time))}} - {{date('H:i', strtotime($schedule->time) + 3600)}}</div>
                        </div>
                        <div class="row">
                            <div class="col-2">Status:</div>
                            <div class="col-10">
                                @if($schedule->deleted_at != null)
                                    <span style="color: red">Dibatalkan</span>
                                @else
                                    <span style="color: green">Disetujui</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
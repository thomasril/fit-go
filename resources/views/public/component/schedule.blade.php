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
            <form>
                <p class="h3">Jadwal</p>
                <div class="form-group">
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            @php
                                $startTime = strtotime($property->open_hour);
                                $endTime = strtotime($property->close_hour);
                            @endphp
                            <th>No.</th>
                            @for($time = $startTime; $time <= $endTime; $time+=3600)
                                <th style="font-size: 12px;">{{date('H:i', $time)}} - {{date('H:i', $time + 3600)}}</th>
                            @endfor
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>No.</td>
                            @for($time = $startTime; $time <= $endTime; $time+=3600)
                                <td style="font-size: 12px;">
                                    <div class="schedule-not-available"></div>
                                </td>
                            @endfor
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@php--}}
{{--    $dt = new stdClass();--}}
{{--    $dt->latitude = -6.2018064;--}}
{{--    $dt->longitude = 106.7794037;--}}
{{--    $dt->name = "Nama Tempat";--}}
{{--@endphp--}}

{{--@include('map.view-one', [--}}
{{--    'data' => $dt--}}
])

@php
$data = [];
    $dt = new stdClass();
    $dt->latitude = -6.2018064;
    $dt->longitude = 106.7794037;
    $dt->name = "Nama Tempat";
$data[] = $dt;
$dt = new stdClass();
$dt->latitude = -6.2018074;
$dt->longitude = 106.7795037;
$dt->name = "Nama Tempat2";
$data[] = $dt;

@endphp

@include('map.view-many', [
    'data' => $data
])
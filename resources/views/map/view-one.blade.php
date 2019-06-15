@extends('map.template.map')

@section('map-script')
    <script>
        $(function() {
            var map = L.map('map').setView(['{{$data->latitude}}', '{{$data->longitude}}'], 16);
            var marker = L.marker(['{{$data->latitude}}', '{{$data->longitude}}']).addTo(map);
            marker.bindPopup('{{$data->name}}').openPopup();
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
        }());
    </script>
@endsection
@extends('map.template.map')

@section('map-script')
    <script>
        $(function() {
            var map = L.map('map').setView(['0', '0'], 16);
            @foreach($data as $dt)
                var marker = L.marker(['{{$dt->latitude}}', '{{$dt->longitude}}']).addTo(map);
                marker.bindPopup('{{$dt->name}}');
            @endforeach
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    latit = position.coords.latitude;
                    longit = position.coords.longitude;
                    $('input[name=latitude]').val(latit);
                    $('input[name=longitude]').val(longit);
                    var circle = L.circle([latit, longit], {
                        color: 'blue',
                        fillColor: 'blue',
                        fillOpacity: 0.5,
                        radius: 10
                    }).addTo(map);
                    circle.bindPopup('Lokasi Sekarang').openPopup();
                    // var m = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
                    map.panTo(new L.LatLng(latit, longit));
                });
            }
        }());
    </script>
@endsection
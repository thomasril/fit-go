@extends('map.template.map')

@section('map-script')
    <input type="hidden" name="longitude">
    <input type="hidden" name="latitude">
    <script>

        $(function() {
            var currentMarker;

            function changeMarker() {
                var latlng = currentMarker._latlng;
                $('input[name=longitude]').val(latlng.lng);
                $('input[name=latitude]').val(latlng.lat);
            }

            var map = L.map('map').setView([51.505, -0.09], 16);

            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.Control.geocoder({
                defaultMarkGeocode: false
            })
                .on('markgeocode', function(e) {
                    currentMarker.remove();
                    latit = e.geocode.center.lat;
                    longit = e.geocode.center.lng;
                    currentMarker = L.marker([latit, longit]).addTo(map);
                    changeMarker();
                    map.panTo(new L.LatLng(latit, longit));
                })
                .addTo(map);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    latit = position.coords.latitude;
                    longit = position.coords.longitude;
                    currentMarker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
                    changeMarker();
                    map.panTo(new L.LatLng(latit, longit));
                });
            }

            map.on('click', function(e){
                currentMarker.remove();
                currentMarker = new L.marker(e.latlng).addTo(map);
                changeMarker();
            });
        }());
    </script>
@endsection
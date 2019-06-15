<link rel="stylesheet" href="{{asset('/plugins/leaflet/leaflet.css')}}">
<link rel="stylesheet" href="{{asset('/plugins/leaflet-control-geocoder/Control.Geocoder.css')}}" />
<style>
    #map {
        width: 100%;
        height: 100%;
    }
</style>
<div id="map"></div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="{{asset('/plugins/leaflet/leaflet.js')}}"></script>
<script src="{{asset('/plugins/leaflet-control-geocoder/Control.Geocoder.js')}}"></script>
@yield('map-script')
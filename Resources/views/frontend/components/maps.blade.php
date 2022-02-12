@php
$id = rand(1, 100);
@endphp
<div class="col-12">
  @if(isset($title) && !empty($title))
    <p class="subtitle h3">{{$title}}</p>
    <hr>
  @endif
  <div class="section-map">
    <div class="map bg-light">
      @if(setting('isite::mapInShow') == 'googleMaps')
        <div class="content">
          <div id="map_canvas_{{setting('isite::mapInShow')}}_" class="{{$classes}} maps-component" style="width:100%; height:314px"></div>
        </div>
      @elseif(setting('isite::mapInShow') == 'openStreet')
        <div class="content">
          <div id="map_canvas_{{setting('isite::mapInShow')}}" class="{{$classes}} maps-component" style="width:100%; height:314px"></div>
        </div>
      @endif
    </div>
    <script type='text/javascript'
            src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css"
          type="text/css"/>
    <script type="text/javascript">
      function initialize() {
        var map = L.map('map_canvas_{{setting('isite::mapInShow')}}').setView([{{$lat}}, {{$lng}}], {{$zoom}});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([{{$lat}}, {{$lng}}]).addTo(map)
          .bindPopup('{{$locationName}}')
          .openPopup();
      }

      $(document).ready(function () {
        initialize();
      });
    </script>
    <script>
      function initMap() {
        const position = {lat: {{$lat}}, lng: {{$lng}}};
        const map = new google.maps.Map(document.getElementById("map_canvas_{{setting('isite::mapInShow')}}"), {
          zoom: {{$zoom}},
          center: position,
        });
        const marker = new google.maps.Marker({
          position: position,
          map: map,
        });
      }
    </script>
  </div>
</div>
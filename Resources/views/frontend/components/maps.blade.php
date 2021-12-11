<div class="col-12">
  <p class="subtitle h3">{{$title}}</p>
  <hr>
  <div class="section-map">
    <div class="map bg-light">
      @if(setting('isite::mapInShow') == 'googleMaps')
        <div class="content">
          <div id="map_canvas_google" class="{{$classes}}" style="width:100%; height:314px"></div>
        </div>
      @elseif(setting('isite::mapInShow') == 'openStreet')
        <div class="content">
          <div id="map_canvas" class="{{$classes}}" style="width:100%; height:314px"></div>
        </div>
      @endif
    </div>
    <script type='text/javascript'
            src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css"
          type="text/css"/>
    <script type="text/javascript">
      function initialize() {
        var map = L.map('map_canvas').setView([{{$lat}}, {{$lng}}], {{$zoom}});
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
        const position = { lat: {{$lat}}, lng: {{$lng}} };
        const map = new google.maps.Map(document.getElementById("map_canvas_google"), {
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
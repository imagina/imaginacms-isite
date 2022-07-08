<div class="component-map map-{{$settingMap}} col-12">
  @if(isset($title) && !empty($title))
    <p class="subtitle h3">{{$title}}</p>
    <hr>
  @endif
  <div class="section-map">
    <div class="map bg-light">
      @if($settingMap == 'googleMaps')
        <div class="content">
          <div id="{{$mapId}}" class="{{$classes}} maps-component" style="width:{{$mapWidth}}; height:{{$mapHeight}}"></div>
        </div>
      @elseif($settingMap == 'openStreet')
        <div class="content">
          <div id="{{$mapId}}" class="map map-home" style="width:{{$mapWidth}}; height:{{$mapHeight}}"></div>
        </div>
      @endif
    </div>
  </div>
</div>

@if($settingMap == 'openStreet')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
          integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
          crossorigin=""></script>
  <script>
    var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      osm = L.tileLayer(osmUrl, {maxZoom: {{$zoom}}, attribution: osmAttrib});
    var map = L.map('{{$mapId}}').setView([{{$lat}}, {{$lng}}], {{$zoom}}).addLayer(osm);
    L.marker([{{$lat}}, {{$lng}}])
      .addTo(map)
      .bindPopup('{{$locationName}}')
      .openPopup();
  </script>
@else

  <script>

@if(!isset($inModal) || !$inModal)

document.addEventListener("DOMContentLoaded", function () {
@endif
    function initMap() {
      const position = {lat: {{$lat}}, lng: {{$lng}}};
      const map = new google.maps.Map(document.getElementById("{{$mapId}}"), {
        zoom: {{$zoom}},
        center: position,
      });
      const marker = new google.maps.Marker({
        position: position,
        map: map,
      });
    }

	initMap();
@if(!isset($inModal) || !$inModal)
 });
@endif

  </script>
@endif

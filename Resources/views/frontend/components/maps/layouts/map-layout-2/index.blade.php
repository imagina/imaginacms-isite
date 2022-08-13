<div class="component-map map-{{$settingMap}} col-12">
  @if(isset($title) && !empty($title))
    <p class="subtitle h3">{{$title}}</p>
    <hr>
  @endif
  <div class="section-map">
    <div class="map bg-light">
      @if($settingMap == 'googleMaps')
        <div class="content">
          <div id="{{$mapId}}" class="{{$classes}} maps-component"
               style="width:{{$mapWidth}}; height:{{$mapHeight}}"></div>
        </div>
      @elseif($settingMap == 'openStreet')
        <div class="content">
          <div id="{{$mapId}}" class="map map-home" style="width:{{$mapWidth}}; height:{{$mapHeight}}"></div>
        </div>
      @endif
    </div>
  </div>
</div>
@foreach($locations as $location)
  <div class="modal fade" id="featureModal-{{$location->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title text-primary">{{$location->title ?? $location->name}}</h4>
          <br>
        </div>
        <div class="modal-footer row">
          <div class="col-6">
            {{$location->description}}
          </div>
          <div class="col-6">

          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach

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
    @foreach($locations as $location)
    var myMarker = L.marker([{{$location->options->locationMap->lat}}, {{$location->options->locationMap->lng}}])
      .addTo(map)
      .bindPopup('{{$location->title ?? $location->name}}')
      .openPopup();

    myMarker.on({
      click: function (e) {
        $("#featureModal-{{$location->id}}").modal("show");
      }
    });
    @endforeach
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
        @foreach($locations as $location)
        const marker = new google.maps.Marker({
          position: {lat: {{$location->lat}}, lng: {{$location->lng}}},
          map: map,
        });
        @endforeach
      }

      initMap();
      @if(!isset($inModal) || !$inModal)
    });
    @endif
  </script>
@endif

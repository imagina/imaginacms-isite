
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
  integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
  crossorigin=""></script>

<script>

    /*
    * Init Variables
    */
    var osmUrl = '{{$mapStyle}}',
    osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    osm = L.tileLayer(osmUrl, {maxZoom: {{$maxZoom}}, minZoom: {{$minZoom}}, attribution: osmAttrib});
    var map = L.map('{{$mapId}}').setView([{{$centerLat}}, {{$centerLng}}], {{$zoom}}).addLayer(osm);

    //Get bound general from Layer
    var bounds = new L.LatLngBounds();

    /*
    * Validations default Image Icon
    */
    @if(isset($imageIcon) && !is_null($imageIcon))
        var mapIcon = L.icon({
        iconUrl: '{{$imageIcon}}',
        className: '{{$markerMapClasses}}',
        iconSize: [{{$iconWidth}}, {{$iconHeight}}], // size of the icon
        iconAnchor: [{{$iconMarginLeft}}, {{$iconMarginTop}}], // point of the icon which will correspond to marker's location
        });
    @endif

    /*
    * Init locations | By default always added one element not necessary to maps livewire component
    */
    @if($usingLivewire==false)
        @foreach($locations as $location)

            var myMarker = L.marker([{{$location['lat']}}, {{$location['lng']}}], @if(isset($imageIcon) && !is_null($imageIcon)){icon: mapIcon}@endif)
            .addTo(map)
            .bindPopup('{{$location['title']}}')
            .openPopup();

            @if(isset($mapEvent) & !is_null($mapEvent))
                myMarker.on({
                click: function (e) {
                    window.livewire.emit('{{$mapEvent}}', {{$location['id']}});
                }
                });
            @endif

        @endforeach
    @endif


    /*
    * Set Market in Map
    */
   function setMarkerOpenstreet()
   {

        //Set content Popup
        var popup = L.popup().setContent(locView)
          
        //Create Marker
        var myMarker = L.marker([locLat, locLng])
          .addTo(map)
          .bindPopup(popup);
          
        //Set bound to Zoom map
        bounds.extend(myMarker.getLatLng());
   }

   /*
    * Deletes all markers 
    */
   function deleteMarkersOpenstreet()
   {
        map.eachLayer((layer) => {
          if (layer instanceof L.Marker) {
            layer.remove();
          }
        });
   }

</script>
<script>

    //Global Variables
    let map;
    let bounds;
    let markers = [];
    
    //Validation Modal
    @if(!isset($inModal) || !$inModal)
      document.addEventListener("DOMContentLoaded", function () {
    @endif
   

    /*
    * Google Map | INIT
    */
    function initMap() 
    {   
        const position = {lat: {{$lat}}, lng: {{$lng}}};
       
        map = new google.maps.Map(document.getElementById("{{$mapId}}"), {
          zoom: {{$zoom}},
          center: position,
        });

        //Bounds Maps
        //bounds = new google.maps.LatLngBounds();

        /*
        * Init locations | By default always added one element not necessary to maps livewire component
        */
        @if($usingLivewire==false)
          const marker = new google.maps.Marker({
            position: position,
            map: map,
          });
        @endif

    }

    //INIT GOOGLE MAPS
    initMap();

    //Validation Modal
    @if(!isset($inModal) || !$inModal) 
      });
    @endif

    /*
    * Set Marker in Google Map
    */
    function setMarkerGoogle(bounds)
    {
      
      const itemPosition = {lat: parseFloat(locLat), lng: parseFloat(locLng)};

      //Init Marker
      const googleMarker = new google.maps.Marker({
            position: itemPosition,
            map: map,
            title: locTitle,
      });

      //Content POPUP
      var popup = new google.maps.InfoWindow({
        content: locView
      });
      
      //Event Click
      googleMarker.addListener("click", () => {
        popup.open(map,googleMarker);
      });
    
      //Set Bounds
      bounds.extend(itemPosition);

      //Save maker
      markers.push(googleMarker);

    }

    /*
    * Deletes all markers in the array by removing references to them.
    */
    function deleteMarkersGoogle() 
    {

      for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
      }
      markers = [];

    }
  
</script>
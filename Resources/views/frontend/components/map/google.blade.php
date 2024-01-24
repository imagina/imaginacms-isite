<script>

    //Global Variables
    let map;
    let bounds;
    let markers = [];
    let urlMarkerIcon;

    //Validation to Marker Icon
    @if(isset($imageIcon) && !is_null($imageIcon))
      urlMarkerIcon = "{{$imageIcon}}"
    @endif

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

        //Init locations | By default always added one element not necessary to maps livewire component
        @if($usingLivewire==false)
          setSimpleMarkGoogle(position)
        @endif

    }

    //INIT GOOGLE MAPS
    initMap();

    //Validation Modal
    @if(!isset($inModal) || !$inModal) 
      });
    @endif


    /*
    * Set Simple mark
    */
    function setSimpleMarkGoogle(position)
    {
      var marker = new google.maps.Marker({
          position: position, 
          map: map
      });
    }

    /*
    * Set Markers in Google Map (Case Item Maps | Livewire Component)
    */
    function setMarkerGoogle(bounds)
    {
      
      const itemPosition = {lat: parseFloat(locLat), lng: parseFloat(locLng)};
      //const iconMarker = "https://dev-lip.ozonohosting.com/assets/media/marker-2.png?u=1705935415";
    
      //Init Marker
      const googleMarker = new google.maps.Marker({
            position: itemPosition,
            map: map,
            title: locTitle,
            label: locId.toString(),
            icon: urlMarkerIcon
      });
      
      //Prueba de marcador personalizado | no funcionó, genera error en "marker"
      /*
      const priceTag = document.createElement("div");
      priceTag.className = "price-tag";
      priceTag.textContent = "$2.5M";
      const googleMarker = new google.maps.marker.AdvancedMarkerView({
            position: itemPosition,
            map: map,
            content: priceTag
      });
      */
      //======================

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
    * Deletes all markers in the array by removing references to them. (Case Item Maps | Livewire Component)
    */
    function deleteMarkersGoogle() 
    {

      for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
      }
      markers = [];

    }
  
</script>
<script>

    console.log("Isite::Components|Map|Google|Init")

    //Global Variables
    let map;
    let bounds;
    let markers = [];
    let urlMarkerIcon;
    let labelLocation;

    //Validation to Marker Icon
    @if(isset($imageIcon) && !is_null($imageIcon))
      urlMarkerIcon = "{{$imageIcon}}"
    @endif

    //Validation to Label Location
    @if(isset($showLocationName) && $showLocationName)
      labelLocation = "{{$locationName}}"
    @endif

    //Se le agrego esta validacion de "usingLivewire", xq cuando se le daba al boton "Agregar nueva direccion" ya no mostraba el mapa
    @if($usingLivewire==false)
      //Validation Modal
      @if(!isset($inModal) || !$inModal)
        document.addEventListener("DOMContentLoaded", function () {
      @endif
    @endif

    //Validation Geocoder to get address
    @if($allowMoveMarker)
      var geocoder = new google.maps.Geocoder();
    @endif
     
    /*
    * Google Map | INIT
    */
    function initMap() 
    {   
      console.log("Isite::Components|Map|Google|initMap")

        const position = {lat: {{$lat}}, lng: {{$lng}}};
       
        map = new google.maps.Map(document.getElementById("{{$mapId}}"), {
          zoom: {{$zoom}},
          center: position,
        });

        //Init locations | By default always added one element not necessary to maps livewire component
        @if($usingLivewire==false)
          setSimpleMarkerGoogle(position)
        @endif

        
        //Multiple Locations By Default | Al segundo intento no funciona
        /*
        @if(!is_null($locations) && count($locations))
          //console.warn("Default Multiple Locations")
          @foreach($locations as $location)
            let locationPosition = {lat: {{$location['lat']}}, lng: {{$location['lng']}}};
            //console.warn("Position: "+locationPosition)
            setSimpleMarkerGoogle(locationPosition)
          @endforeach
        @endif
        */
        
        
       
        //return newMap
    }

    //INIT GOOGLE MAPS
    initMap();

    //Se le agrego esta validacion de "usingLivewire", xq cuando se le daba al boton "Agregar nueva direccion" ya no mostraba el mapa
    @if($usingLivewire==false)
      //Validation Modal
      @if(!isset($inModal) || !$inModal) 
        });
      @endif
    @endif


    /*
    * Set Simple mark | First Time
    */
    function setSimpleMarkerGoogle(position)
    {
      var marker = new google.maps.Marker({
          position: position, 
          map: map,
          @if(!is_null($imageIcon)) icon: urlMarkerIcon, @endif
          @if(!is_null($showLocationName))  label: labelLocation, @endif
          @if($allowMoveMarker) draggable:true @endif
      });

      @if($allowMoveMarker)
        marker.addListener("dragend", (event) => {
          const mPosition = marker.position;
          //console.log("LAT:"+mPosition.lat())

          // Get Address 
          getAddressFromPosition(marker.getPosition());

        });
      @endif

      markers.push(marker)
    }

    /*
    * Set Markers in Google Map (Case Item Maps | Livewire Component)
    */
    function setMarkerGoogle(bounds)
    {
      console.warn('SET MARKER GOOGLE') 

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

    /*
    * Get Data Especific Address Google
    */
    function getDataFromAddressGoogle(addressComponents)
    {
        var components = {};
        var city;
        var postalCode = null;
        var state;
        var country;
      
        jQuery.each(addressComponents, function(k,v1) {
            jQuery.each(v1.types,function(k2,v2){
                components[v2] = v1.short_name
            });
        });
                
        if(components.locality) { city = components.locality; }
        if(!city) { city = components.administrative_area_level_1; }
        if(components.postal_code) { postalCode = components.postal_code; }
        if(components.administrative_area_level_1) { state = components.administrative_area_level_1; }
        if(components.country) { country = components.country; }
        //console.warn("COUNTRY: "+country+" | STATE: "+state+" | CITY: "+city+" | Postal: "+postalCode)
        //Data Final
        var addressData = {country: country, state: state, city: city, postal: postalCode};

        return addressData;
    }

    /*
    * Get Address Format 
    */
    function getAddressFromPosition(pos) 
    {
      var addressFormat;

      geocoder.geocode({latLng: pos}, function(responses) {
       
        if (responses && responses.length > 0) {
          //console.warn(responses)
          addressFormat = responses[0].formatted_address;

          //method in  = Address Form | Auto Complete Google
          var addressData = getDataFromAddressGoogle(responses[0].address_components)

        } else {
          addressFormat = 'Cannot determine address at this location.';
        }

        //Send data to Address Component
        emitAddressToUpdate(addressFormat,pos,addressData)
      });

    }
  
    /*
    * Send Data to Livewire Address Form Component
    */
    function emitAddressToUpdate(addressFormat,pos,addressData)
    {
      //Data Final
      var newPosition = {lat: pos.lat(), lng: pos.lng()}
     
      //@var inputVarName ya fue declarada en el componente livewire
      var dataToSend = {inputValue: addressFormat, inputVarName: inputVarName, newPosition: newPosition, addressData: addressData}; 

      //Emit to send data
      window.livewire.emit('updateDataFromExternal',dataToSend);
    }

    /*
    * LIVEWIRE | Listener Component | Case Address Form | Update Marker with Google Autocomplete
    */
    @if(isset($allowMoveMarker))
      window.addEventListener('google-update-marker-in-map', event => {
        //Before delete markers
        deleteMarkersGoogle()

        //Init and Reset Bounds
        var bounds = new google.maps.LatLngBounds();

        //Get data
        var itemPosition = event.detail.itemPosition

        //Create Marker
        setSimpleMarkerGoogle(itemPosition)

        //Set Bounds
        bounds.extend(itemPosition);
        map.fitBounds(bounds);

      });
    @endif
  
</script>
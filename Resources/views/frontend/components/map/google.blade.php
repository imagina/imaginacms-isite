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

    //Validation Active Click and Emit
    var activeClickInMarker = false;
    var emitAfterClickMarker = false;

    @if($activeClickInMarker)
      activeClickInMarker = true
      @if($emitAfterClickMarker)
        emitAfterClickMarker = true
      @endif
    @endif

    //Validation Animation in marker
    var activeAnimationInMarker = false;
    @if($activeAnimationInMarker) activeAnimationInMarker = true @endif

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
        @else
          //Multiple Locations By Default
          @if($initMultipleLocations && !is_null($locations) && count($locations))

            //Delete Markers
            deleteMarkersGoogle();
            //Get Valuae Default
            var locationDefaultName = "{{$locationName}}"
            //Init and Reset Bounds
            var bounds = new google.maps.LatLngBounds();
            //Check All Locations
            @foreach($locations as $location)

              var locationPosition = {lat: {{$location['lat']}}, lng: {{$location['lng']}}};
              var locationId = "{{$location['id']}}"
              var locationTitle = "{{$location['title']}}"
              //Esto es porque siempre agregan un locationDefault, con una serie de parametros, pero para estos casos no es necesario
              if(locationDefaultName!=locationTitle){
                setSimpleMarkerGoogle(locationPosition,locationId,locationTitle,bounds,activeClickInMarker,emitAfterClickMarker,"",locationTitle)
              }
            @endforeach

          @endif

        @endif


        /*
        * Click Event | Marker
        */
        @if($allowMoveMarker)
          map.addListener('click', function(markE) {
            console.log("Listener|Click")

            var inputVarName = "{{$inputVarName}}"

            //Before delete markers
            deleteMarkersGoogle()
            //set Marker
            setSimpleMarkerGoogle(markE.latLng,null,"",null,false,false,inputVarName)
            // Get Address and then emit to save the data
            getAddressFromPosition(markE.latLng,inputVarName);

          });
        @endif

        //return newMap
    }

    //INIT GOOGLE MAPS //TODO: Revisar por que no carga sin un timeout
    setTimeout(() => initMap(), 1000)

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
    function setSimpleMarkerGoogle(position,id=null,title="",bounds=null,activeClickInMarker=false, emitAfterClickMarker=false,inputVarName="",label=null)
    {

      var labelMarker = labelLocation; //Global Variable | Default
      if(label!=null) labelMarker = label;//Especific label

      var labelFontSize =  "{{$labelFontSize}}";
      var labelFontWeight =  "{{$labelFontWeight}}";
      var labelColor =  "{{$labelColor}}";

      var marker = new google.maps.Marker({
          position: position,
          map: map,
          title: title,
          @if(!is_null($imageIcon)) icon: urlMarkerIcon, @endif
          @if(!is_null($showLocationName) && $showLocationName)  label: {className:"marker-position" ,fontSize: labelFontSize ,text: labelMarker, fontWeight:labelFontWeight, color:labelColor}, @endif
          @if($allowMoveMarker) draggable:true @endif
          @if($activeAnimationInMarker) animation: google.maps.Animation.DROP, @endif
      });

      @if($allowMoveMarker)
        marker.addListener("dragend", (event) => {
          console.log("Listener|Dragen|Position")
          //var mPosition = marker.position;
          //console.log(marker.getPosition())
          //console.log("LAT:"+mPosition.lat())

          // Get Address
          getAddressFromPosition(marker.getPosition(),inputVarName);

        });
      @endif

      //Set Bounds
      if(bounds!=null){
        bounds.extend(position);
        map.fitBounds(bounds);//OJOOOOO CON ESTE MAPPPP probar luego con el otro
      }

      //Save Markers
      markers.push(marker)

      //Event Click
      if(activeClickInMarker){
        marker.addListener("click", () => {

          if(activeAnimationInMarker){
            for (let i = 0; i < markers.length; i++) { markers[i].setAnimation(null);}
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }

          if(emitAfterClickMarker){
            //Emit to send data
            window.livewire.emit('markerSelectedFromMap',id);
          }

        });
      }

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
    * Get Address Format when Move a Marker
    */
    function getAddressFromPosition(pos,inputVarName)
    {

      console.log("Isite::Components|Map|Google|getAddressFromPosition|InputVarName: "+inputVarName)

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
        emitAddressToUpdate(addressFormat,pos,addressData,inputVarName)
      });

    }

    /*
    * Send Data to Livewire Address Form Component
    */
    function emitAddressToUpdate(addressFormat,pos,addressData,inputVarName)
    {

      console.log("Isite::Components|Map|Google|emitAddressToUpdate")

      //Data Final
      var newPosition = {lat: pos.lat(), lng: pos.lng()}

      //Fix data to send the Component Address From
      var dataToSend = {inputValue: addressFormat, inputVarName: inputVarName, newPosition: newPosition, addressData: addressData};

      //Emit to send data
      window.livewire.emit('updateDataFromExternal',dataToSend);
    }

    /*
    * LIVEWIRE | Listener Component | Case Address Form | Update Marker with Google Autocomplete
    */
    @if($allowMoveMarker)

      window.addEventListener('google-update-marker-in-map', event => {

        console.log("Isite::Components|Map|Google|Listener|google-update-marker-in-map")

        //Before delete markers
        deleteMarkersGoogle()

        //Init and Reset Bounds
        var bounds = new google.maps.LatLngBounds();

        //Get data
        var itemPosition = event.detail.itemPosition;
        var iVn = event.detail.inputVarName;

        //Create Marker
        setSimpleMarkerGoogle(itemPosition,null,"",null,false,false,iVn)

        //Set Bounds
        bounds.extend(itemPosition);
        map.fitBounds(bounds);

        //Testing | Google Set 22
        //var newZoom = map.getZoom();
        //console.warn(newZoom)
        //map.setZoom(21);

      });

    @endif



</script>

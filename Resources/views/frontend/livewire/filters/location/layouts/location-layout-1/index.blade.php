<div class="filter-{{$type}} filter-{{$type}}-layout-{{$layout}} filter-{{$name}}">
	
	<div class="d-flex">

		<input 
	        type="text" 
	        name="input-search-location" 
	        id="input-search-location"
	        autocomplete="off" 
	        placeholder="{{trans('isite::frontend.filter-location.input-placeholder')}}"
            value="{{$inputSearchLocation}}"
            wire:ignore>

	    <div id="locate" class="locate" title="{{trans('isite::frontend.filter-location.title-nearme')}}">
	        <div class="locate-icon-wrapper d-flex justify-content-center align-items-center">

                <i id="locate-near-icon" class="fa fa-dot-circle-o text-primary cursor-pointer" aria-hidden="true"></i>
               
	        </div>
	    </div>

	  	@if(!empty($radio))
		    <div class="search-location-radius">
		        <select id="select-radius" wire:model="selectedRadio">
		        	@foreach($radio['values'] as $key => $value)
			            <option value="{{$value}}">{{$value}} {{$radio['measure']}}</option>
			        @endforeach
		        </select>
		    </div>
		@endif


	</div>

</div>

@section('scripts-owl')
    @parent

     <script
      src="https://maps.googleapis.com/maps/api/js?key={{setting('isite::api-maps')}}&libraries=places"
    ></script>

    <script>

        $(document).ready(function () {

            
            function initGeolocation(){
                if ("geolocation" in navigator){
                    navigator.geolocation.getCurrentPosition(showLocation, showError, {timeout:2000, enableHighAccuracy: true}); //position request
                }else{
                    console.log("Browser doesn't support geolocation!");
                }
            }

            //Success Callback
            function showLocation(position){

            	@this.lat = position.coords.latitude;
            	@this.lng = position.coords.longitude;
                @this.inputSearchLocation = "{{trans('isite::frontend.filter-location.title-nearme')}}";

            	$("#input-search-location").val("{{trans('isite::frontend.filter-location.title-nearme')}}");

            }

            //Error Callback
            function showError(error){
               switch(error.code) {
                    case error.PERMISSION_DENIED:
                        alert("{{trans('isite::frontend.filter-location.geolocation.denied')}}");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("{{trans('isite::frontend.filter-location.geolocation.unavailable')}}");
                        break;
                    case error.TIMEOUT:
                        alert("{{trans('isite::frontend.filter-location.geolocation.timeout')}}");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("{{trans('isite::frontend.filter-location.geolocation.error')}}");
                        break;
                }
            }

            // Event Click Locate Near Icon
            const el = document.getElementById("locate-near-icon");
            el.addEventListener("click", initGeolocation, false);


            // Google Maps Places
            var searchInput = 'input-search-location';
            var autocomplete;

            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "COL"
                }
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function () {

                var near_place = autocomplete.getPlace();

                @this.lat = near_place.geometry.location.lat();
                @this.lng = near_place.geometry.location.lng();
                
            });
           

        });
    </script>
@stop
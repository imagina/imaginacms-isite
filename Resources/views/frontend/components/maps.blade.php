<div class="component-map map-{{$settingMap}}">
  @if($withTitle)
    <div class="title-section {{$alignTitle}}">
      {{$title}}
    </div>
  @endif
  <div class="section-map">
    <div class="map">
      @if(isset($iframeMap) && !empty($iframeMap))
        {!! $iframeMap !!}
      @else
        @if($settingMap == 'googleMaps')
          <div class="content">
            <div id="{{$mapId}}" class="{{$classes}} maps-component"
                 style="width:{{$mapWidth}}; height:{{$mapHeight}}" @if($usingLivewire) wire:ignore @endif></div>
          </div>
        @elseif($settingMap == 'openStreet')
          <div class="content">
            <div id="{{$mapId}}" class="map map-home" style="width:{{$mapWidth}}; height:{{$mapHeight}}"  @if($usingLivewire) wire:ignore @endif></div>
          </div>
        @endif
      @endif 
    </div>
  </div>
</div>

@section('scripts')
@parent

  {{-- SCRIPTS TO OPENSTREET --}}
  @if($settingMap == 'openStreet')
    @include('isite::frontend.components.map.openstreet')
  @else
    @include('isite::frontend.components.map.google')
  @endif

  <!-- Global Scripts -->
  <script>

    /*
    * LIVEWIRE | Listener Component
    */
    window.addEventListener('items-map-updated', event => {
      
      @if($settingMap == 'openStreet')
        deleteMarkersOpenstreet()
      @else
        deleteMarkersGoogle()
      @endif
      
      //Init and Reset Bounds
      var bounds = new google.maps.LatLngBounds();
      //Init Attributes
      let locationItems;
      //Get Attributes
      locationItems = event.detail.locationsItem;

      //Set Locations
      Object.entries(locationItems).forEach(([key, location]) => {

        //Get Infor
        locLat = location.lat;
        locLng = location.lng;
        locTitle = location.title;
        locView = location.renderedView;
        locId = location.id;
        //console.log(locTitle+"|LAT: "+locLat+"|LNG: "+locLng)

        //Validation exists data
        if(locLat && locLng){

          @if($settingMap == 'openStreet')
            setMarkerOpenstreet(bounds)
          @else
            setMarkerGoogle(bounds)
          @endif

        }

      });

      //Set new bounds (Both Google and Streetmaps)
      map.fitBounds(bounds);

    })

  </script>

@stop

<!-- Extra Styles -->
<style>

  @if(!empty($colorTitleSection) && !empty($fontSizeTitleSection))
    .component-map .title-section {
      color: {{$colorTitleSection}};
      font-size: {{$fontSizeTitleSection}}px;
  }
  @endif

</style>
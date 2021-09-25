@if(!empty($addresses))
  <div id="componentContactAddresses">
    <div class="relative-position">
      <x-isite::edit-link
        link="/iadmin/#/site/settings?module=isite&settings=addresses"
        :tooltip="trans('isite::common.editLink.tooltipAddress')"/>
    </div>
    <div class="d-flex">
      @if($showIcon)
        <i class="{{$icon}} align-self-center mr-2"></i>
      @endif
      <div class="content-address">
        @foreach($addresses as $key => $addresses)
          <a href="https://google.com.co/maps/search/{{$addresses}}" target="_blank">
            @if($key > 0)&nbsp;-&nbsp;@endif
            <div class="d-inline-block">{{$addresses}}</div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endif

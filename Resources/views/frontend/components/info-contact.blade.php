<div id="infoContactComponent">
  <div class="{{$container}}">
    @if($withTitle)
      <div class="title-section {{$AlainTitle}}">
        {{$title}}
      </div>
    @endif
    @if($withSubtitle)
      <div class="subtitle-section {{$AlainSubtitle}}">
        {{$subtitle}}
      </div>
    @endif
    @if($withPhone)
      <div class="row {{$border}} {{$paddingY}} {{$paddingX}} {{$marginY}} {{$marginX}}">
        @if($withIconPhone)
          <div class="col-12 col-md-1 col-lg-2">
            <i class="{{$iconPhone}}"></i>
          </div>
        @endif
        <div class="col-10">
          @if($withTitlePhone)
            <div class="title-contact {{$AlainTitleInfoContact}}">
              {{$titlePhone}}
            </div>
          @endif
          <x-isite::contact.phones :showIcon="$withIconComponentPhone"/>
        </div>
      </div>
    @endif
    @if($withAddress)
      <div class="row {{$border}} {{$paddingY}} {{$paddingX}} {{$marginY}} {{$marginX}}">
        @if($withIconAddress)
          <div class="col-12 col-md-1 col-lg-2">
            <i class="{{$iconAddress}}"></i>
          </div>
        @endif
        <div class="col-10">
          @if($withTitleAddress)
            <div class="title-contact {{$AlainTitleInfoContact}}">
              {{$titleAddress}}
            </div>
          @endif
          <x-isite::contact.addresses :showIcon="$withIconComponentAddress"/>
        </div>
      </div>
    @endif
    @if($withEmail)
      <div class="row {{$border}} {{$paddingY}} {{$paddingX}} {{$marginY}} {{$marginX}}">
        @if($withIconEmail)
          <div class="col-12 col-md-1 col-lg-2">
            <i class="{{$iconEmail}}"></i>
          </div>
        @endif
        <div class="col-10">
          @if($withTitleEmail)
            <div class="title-contact {{$AlainTitleInfoContact}}">
              {{$titleEmail}}
            </div>
          @endif
          <x-isite::contact.emails :showIcon="$withIconComponentEmail"/>
        </div>
      </div>
    @endif
    @if($withSocialNetworks)
      <div class="row {{$alainSocialNetwork}} {{$border}} {{$paddingY}} {{$paddingX}} {{$marginY}} {{$marginX}} ">
        <x-isite::social :layout="$layoutSocialNetwork"/>
      </div>
    @endif
  </div>
</div>
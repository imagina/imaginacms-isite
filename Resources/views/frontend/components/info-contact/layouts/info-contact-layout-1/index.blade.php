<div id="infoContactComponent">
  <div class="{{$container}}">
    @if($withTitle)
      <div class="title-section {{$alignTitle}}">
        {{$title}}
      </div>
    @endif
    @if($withSubtitle)
      <div class="subtitle-section {{$alignSubtitle}}">
        {{$subtitle}}
      </div>
    @endif
    @if($withPhone)
      <div
        class="info component-phone {{$orderInfo['phone']}} {{$contentBorderType}} {{$contentPaddingY}}
        {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconPhone)
            <div class="col-12 col-md-1 col-lg-2">
              <i class="{{$iconPhone}}"></i>
            </div>
          @endif
          <div class="col-10">
            @if($withTitlePhone)
              <div class="title-contact {{$alignTitleInfoContact}}">
                {{$titlePhone}}
              </div>
            @endif
            <x-isite::contact.phones :showIcon="$withIconComponentPhone"/>
          </div>
        </div>
      </div>
    @endif
    @if($withAddress)
      <div
        class="info component-address {{$orderInfo['address']}} {{$contentBorderType}} {{$contentPaddingY}}
        {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconAddress)
            <div class="col-12 col-md-1 col-lg-2">
              <i class="{{$iconAddress}}"></i>
            </div>
          @endif
          <div class="col-10 order-2">
            @if($withTitleAddress)
              <div class="title-contact {{$alignTitleInfoContact}}">
                {{$titleAddress}}
              </div>
            @endif
            <x-isite::contact.addresses :showIcon="$withIconComponentAddress"/>
          </div>
        </div>
      </div>
    @endif
    @if($withEmail)
      <div class="info component-email {{$orderInfo['email']}} {{$contentBorderType}} {{$contentPaddingY}}
      {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconEmail)
            <div class="col-12 col-md-1 col-lg-2">
              <i class="{{$iconEmail}}"></i>
            </div>
          @endif
          <div class="col-10 order-1">
            @if($withTitleEmail)
              <div class="title-contact {{$alignTitleInfoContact}}">
                {{$titleEmail}}
              </div>
            @endif
            <x-isite::contact.emails :showIcon="$withIconComponentEmail"/>
          </div>
        </div>
      </div>
    @endif
    @if($withSocialNetworks)
      <div
        class="info component-social-networks {{$orderInfo['socialNetworks']}} {{$contentBorderType}}
        {{$contentPaddingY}} {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row {{$alignSocialNetwork}}">
          <x-isite::social :layout="$layoutSocialNetwork"/>
        </div>
      </div>
    @endif
  </div>
</div>


<style>

    #infoContactComponent .info {
      @if(!empty($contentBorderType) || $contentBorderType = "")
        border-width: {{$contentBorder}}px;
        border-style: solid;
        border-color: {{$contentBorderColor}};
    @endif
}

    #infoContactComponent .title-section {
        color: {{$colorTitleSection}};
        font-size: {{$fontSizeTitleSection}}px;
    }

    #infoContactComponent .subtitle-section {
        color: {{$colorSubtitleSection}};
        font-size: {{$fontSizeSubtitleSection}}px;
    }

    #infoContactComponent .title-contact {
        color: {{$colorTitleContact}};
        font-size: {{$fontSizeTitleContact}}px;
    }

    #infoContactComponent i {
        color: {{$colorIcons}};
        font-size: {{$fontSizeIcons}}px;
    }
</style>
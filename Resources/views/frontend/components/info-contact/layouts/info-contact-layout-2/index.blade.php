<div id="{{$id}}" class="infoContactComponent {{$contactClass}}">
  <div class="{{$container}}">
    @if($withTitle)
      <div class="title-section {{$alignTitle}} {{$titlePaddingY}} {{$titlePaddingX}} {{$titleSectionColorByClass}}">
        {{$title}}
      </div>
    @endif
    @if($withSubtitle)
      <div class="subtitle-section {{$alignSubtitle}} {{$subtitlePaddingY}} {{$subtitlePaddingX}} {{$subtitleSectionColorByClass}}">
        {{$subtitle}}
      </div>
    @endif
    <div class="group-contact">
    @if($withPhone)
      <div class="info component-phone {{$orderInfo['phone']}} {{$contentPaddingY}} {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconPhone)
            <div class="col-auto {{$alignIcons}} {{$iconsPaddingY}} {{$iconsPaddingX}} {{$iconsMarginY}} {{$iconsMarginX}}">
              <i class="{{$iconPhone}}"></i>
            </div>
          @endif
          <div class="col {{$displayFlex}}">
            @if($withTitlePhone)
              <div class="title-contact {{$alignTitleInfoContact}} {{$titleContactColorByClass}}">
                {{$titlePhone}}
              </div>
            @endif
            <x-isite::contact.phones :showIcon="$withIconComponentPhone" :icon="$iconPhone" :withHyphen="$withHyphen"/>
          </div>
        </div>
      </div>
    @endif
    @if($withAddress)
      <div class="info component-address {{$orderInfo['address']}} {{$contentPaddingY}} {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconAddress)
            <div class="col-auto {{$alignIcons}} {{$iconsPaddingY}} {{$iconsPaddingX}} {{$iconsMarginY}} {{$iconsMarginX}}">
              <i class="{{$iconAddress}}"></i>
            </div>
          @endif
          <div class="col {{$displayFlex}}">
            @if($withTitleAddress)
              <div class="title-contact {{$alignTitleInfoContact}} {{$titleContactColorByClass}}">
                {{$titleAddress}}
              </div>
            @endif
            <x-isite::contact.addresses :showIcon="$withIconComponentAddress" :icon="$iconAddress" :withHyphen="$withHyphen"/>
          </div>
        </div>
      </div>
    @endif
    @if($withEmail)
      <div class="info component-email {{$orderInfo['email']}} {{$contentPaddingY}} {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconEmail)
            <div class="col-auto {{$alignIcons}} {{$iconsPaddingY}} {{$iconsPaddingX}} {{$iconsMarginY}} {{$iconsMarginX}}">
              <i class="{{$iconEmail}}"></i>
            </div>
          @endif
          <div class="col {{$displayFlex}}">
            @if($withTitleEmail)
              <div class="title-contact {{$alignTitleInfoContact}} {{$titleContactColorByClass}}">
                {{$titleEmail}}
              </div>
            @endif
            <x-isite::contact.emails :showIcon="$withIconComponentEmail" :icon="$iconEmail" :withHyphen="$withHyphen"/>
          </div>
        </div>
      </div>
    @endif
    @if($withSocialNetworks)
      <div class="info component-social-networks {{$orderInfo['socialNetworks']}} {{$contentPaddingY}} {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="d-flex {{$alignSocialNetwork}}">
          <x-isite::social id="{{$id}}-social" :layout="$layoutSocialNetwork" />
        </div>
      </div>
    @endif
    </div>
  </div>
</div>
<style>
    @if(!empty($contentBorderType) || $contentBorderType = "")
    #{{$id}} .info {
        {{$contentBorderType}}-width: {{$contentBorder}}px;
        {{$contentBorderType}}-style: solid;
        {{$contentBorderType}}-color: {{$contentBorderColor}};
    }
    @endif
    #{{$id}} .group-contact {
        display: flex;
        flex-direction: column;
    }
    #{{$id}} .title-section {
        @if($titleSectionColorByClass=='text-custom') color: {{$colorTitleSection}}; @endif
        font-size: {{$fontSizeTitleSection}}px;
    }
    #{{$id}} .subtitle-section {
         @if($subtitleSectionColorByClass=='text-custom') color: {{$colorSubtitleSection}}; @endif
        font-size: {{$fontSizeSubtitleSection}}px;
    }
    #{{$id}} .title-contact {
        @if($titleContactColorByClass=='text-custom') color: {{$colorTitleContact}}; @endif
        font-size: {{$fontSizeTitleContact}}px;
    }
    #{{$id}} i {
        color: {{$colorIcons}};
        font-size: {{$fontSizeIcons}}px;
    }
    @if($colorContentContact) #{{$id}} a { color: {{$colorContentContact}}; } @endif
</style>

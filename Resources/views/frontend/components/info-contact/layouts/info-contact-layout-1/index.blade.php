<div id="infoContactComponent">
  <div class="{{$container}}">
    @if($withTitle)
      <div class="title-section {{$alignTitle}} {{$titlePaddingY}} {{$titlePaddingX}} {{$titleSectionColorByClass}}">
        {{$title}}
      </div>
    @endif
    @if($withSubtitle)
      <div class="subtitle-section {{$alignSubtitle}} {{$subtitlePaddingY}} {{$subtitlePaddingX}}
      {{$subtitleSectionColorByClass}}">
        {{$subtitle}}
      </div>
    @endif
    @if($withPhone)
      <div
        class="info component-phone {{$orderInfo['phone']}} {{$contentPaddingY}}
        {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconPhone)
            <div class="col-12 col-md-1 col-lg-2 {{$alignIcons}} {{$iconsPaddingY}}
            {{$iconsPaddingX}} {{$iconsMarginY}} {{$iconsMarginX}}">
              <i class="{{$iconPhone}}"></i>
            </div>
          @endif
          <div class="col-10">
            @if($withTitlePhone)
              <div class="title-contact {{$alignTitleInfoContact}} {{$titleContactColorByClass}}">
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
        class="info component-address {{$orderInfo['address']}} {{$contentPaddingY}}
        {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconAddress)
            <div class="col-12 col-md-1 col-lg-2 {{$alignIcons}} {{$iconsPaddingY}}
            {{$iconsPaddingX}} {{$iconsMarginY}} {{$iconsMarginX}}">
              <i class="{{$iconAddress}}"></i>
            </div>
          @endif
          <div class="col-10 order-2">
            @if($withTitleAddress)
              <div class="title-contact {{$alignTitleInfoContact}} {{$titleContactColorByClass}}">
                {{$titleAddress}}
              </div>
            @endif
            <x-isite::contact.addresses :showIcon="$withIconComponentAddress"/>
          </div>
        </div>
      </div>
    @endif
    @if($withEmail)
      <div class="info component-email {{$orderInfo['email']}} {{$contentPaddingY}}
      {{$contentPaddingX}} {{$contentMarginY}} {{$contentMarginX}}">
        <div class="row">
          @if($withIconEmail)
            <div class="col-12 col-md-1 col-lg-2 {{$alignIcons}} {{$iconsPaddingY}}
            {{$iconsPaddingX}} {{$iconsMarginY}} {{$iconsMarginX}}">
              <i class="{{$iconEmail}}"></i>
            </div>
          @endif
          <div class="col-10 order-1">
            @if($withTitleEmail)
              <div class="title-contact {{$alignTitleInfoContact}} {{$titleContactColorByClass}}">
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
        class="info component-social-networks {{$orderInfo['socialNetworks']}}
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
      {{$contentBorderType}}-width: {{$contentBorder}}px;
      {{$contentBorderType}}-style: solid;
      {{$contentBorderType}}-color: {{$contentBorderColor}};
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
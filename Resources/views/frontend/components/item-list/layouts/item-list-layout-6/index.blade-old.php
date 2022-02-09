<div class="item-layout item-list-layout-1 position-relative {{$itemStyle}}">
    <x-isite::edit-link link="{{$editLink}}{{$item->id}}" tooltip="{{$tooltipEditLink}}"/>
  <div class="card-category card-item border-0">
    <div class="row align-items-center">

      @if(isset($item->type) && $item->type=="video")
        <div class="col-12 {{$orderClasses["photo"] ?? 'order-0'}} item-video">
          <iframe
            width="100%"
            class="embed-responsive-item"
            frameborder="0"
            allowfullscreen
            src="{{$item->url}}">
          </iframe>
        </div>

      @else

        @if(method_exists ( $item, "mediaFiles" ) )
          <div class="col-12 {{$orderClasses["photo"] ?? 'order-0'}} item-image prueba-e">
            <x-media::single-image :alt="$item->title ?? $item->name" :title="$item->title ?? $item->name" :
                                   :url="$item->url ?? null" :isMedia="true" width="100%"
                                   :target="$target" imgStyles="aspect-ratio:{{$imageAspect}};
                                                                object-fit:{{$imageObject}};
                                                                border-radius:{{$imageBorderRadio}}{{$imageBorderRadioUnit}};
                                                                border-style: {{$imageBorderStyle}};
                                                                border-width:{{$imageBorderWidth}}px;
                                                                border-color:{{$imageBorderColor}};
                                                                padding:{{$imagePadding}}px;"
                                   :mediaFiles="$item->mediaFiles()" :zone="$mediaImage ?? 'mainimage'"/>

          </div>
        @endif

      @endif
      <div class="col-12 {{$orderClasses["title"] ?? 'order-1'}} item-title">
        @if(isset($item->url) && !empty($item->url))
          <a href="{{$item->url}}" target="{{$target}}">
            @endif
            <h3 class="title">
              {{$item->title ?? $item->name}}
            </h3>
            @if(isset($item->url) && !empty($item->url))
          </a>
        @endif
      </div>
      @if($withCreatedDate && isset($item->created_at))
        <div class="col-12 {{$orderClasses["date"] ?? 'order-2'}} item-created-date">
          @if(isset($item->url)&& !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div class="created-date">{{ $item->created_at->format($formatCreatedDate) }}</div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withCategory && isset($item->category->id))
        <div class="col-12 {{$orderClasses["categoryTitle"] ?? 'order-3'}} item-category">
          @if(isset($item->category->url) && !empty($item->category->url))
            <a href="{{$item->category->url}}" target="{{$target}}">
              @endif
              <h5 class="category">
                {{$item->category->title ?? $item->category->name}}
              </h5>
              @if(isset($item->category->url) && !empty($item->category->url))
            </a>
          @endif
        </div>
      @endif
      @if($withSummary && ( isset($item->summary) || isset($item->description) || isset($item->custom_html)) )
        <div class="col-12 {{$orderClasses["summary"] ?? 'order-4'}} item-summary">
          @if(isset($item->url) && !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div class="summary">
                {!! Str::limit( $item->summary ?? $item->description ?? $item->custom_html ?? '', $numberCharactersSummary) !!}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withViewMoreButton)
        <div class="col-12 {{$orderClasses["viewMoreButton"] ?? 'order-5'}} item-view-more-button {{$buttonAlign}}">
          @if(isset($item->url) && !empty($item->url))
            <a href="{{$item->url}}" class="btn view-more-button" target="{{$target}}">
              @endif
                @if($buttonIconLR=="left") <i class="{{$buttonIcon}} mr-1"></i>  @endif
                {{trans($viewMoreButtonLabel)}}
                @if($buttonIconLR=="right") <i class="{{$buttonIcon}} ml-1"></i>  @endif
            @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
    </div>

  </div>
</div>

<style>
    :root {
        --imagen-opacity-color: {{$imageOpcityColor}};
        --button-border-radio: {{$buttonBorderRadio}};
        --button-border-radio-unit: {{$buttonBorderRadioUnit}};
        --button-border-style: {{$buttonBorderStyle}};
        --button-border-width:{{$buttonBorderWidth}};
        --button-border-color:{{$buttonBorderColor}};
        --button-padding-t-b:{{$buttonPaddingTB}};
        --button-padding-l-r: {{$buttonPaddingLR}};
        --button-text-size: {{$buttonTextSize}};
        --button-text-weight: {{$buttonTextWeight}};
        --button-text-color: {{$buttonTextColor}};
    }
    .view-more-button {
        border-radius:{{$buttonBorderRadio}}{{$buttonBorderRadioUnit}};
        border-style: {{$buttonBorderStyle}};
        border-width:{{$buttonBorderWidth}}px;
        border-color:{{$buttonBorderColor}};
        padding:{{$buttonPaddingTB}}px {{$buttonPaddingLR}}px;
        color: {{$buttonTextColor}};
        font-size: {{$buttonTextSize}}px;
        font-weight: {{$buttonTextWeight}};
        background-color: {{$buttonBackgroundColor}};
    }
    .view-more-button i {
        color: {{$buttonIconColor}};
    }
</style>
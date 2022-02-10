<div class="item-layout item-list-layout-6 position-relative ">
    <x-isite::edit-link link="{{$editLink}}{{$item->id}}" tooltip="{{$tooltipEditLink}}"/>
  <div class="card-item">
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
          <div class="col-12 {{$orderClasses["photo"] ?? 'order-0'}} item-image @if($withImageOpacity) {{$imageOpacityColor}} {{$imageOpacityDirection}} @endif">
            <x-media::single-image :alt="$item->title ?? $item->name" :title="$item->title ?? $item->name" :
                                   :url="$item->url ?? null" :isMedia="true" width="100%" imgClasses="img-style"
                                   :target="$target" :mediaFiles="$item->mediaFiles()" :zone="$mediaImage ?? 'mainimage'"/>

          </div>
        @endif

      @endif
      @if($withTitle)
      <div class="col-12 {{$orderClasses["title"] ?? 'order-1'}} item-title {{$titleAlign}}">
        @if(isset($item->url) && !empty($item->url))
          <a href="{{$item->url}}" target="{{$target}}">
            @endif
            <h3 class="title {{$titleTextWeight}} {{$titleTextTransform}} {{$titleColor}} {{$titleMarginT}} {{$titleMarginB}} {{$contentMarginInsideX}}">
              {{$item->title ?? $item->name}}
            </h3>
            @if(isset($item->url) && !empty($item->url))
          </a>
        @endif
      </div>
      @endif
      @if($withCreatedDate && isset($item->created_at))
        <div class="col-12 {{$orderClasses["date"] ?? 'order-2'}} item-created-date {{$createdDateAlign}}">
          @if(isset($item->url)&& !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div class="created-date {{$createdDateTextWeight}} {{$createdDateColor}} {{$createdDateMarginT}} {{$createdDateMarginB}} {{$contentMarginInsideX}}">
                  {{ $item->created_at->format($formatCreatedDate) }}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withCategory && isset($item->category->id))
        <div class="col-12 {{$orderClasses["categoryTitle"] ?? 'order-3'}} item-category {{$categoryAlign}}">
          @if(isset($item->category->url) && !empty($item->category->url))
            <a href="{{$item->category->url}}" target="{{$target}}">
              @endif
              <h5 class="category {{$categoryTextWeight}} {{$categoryColor}} {{$categoryMarginT}} {{$categoryMarginB}} {{$contentMarginInsideX}}">
                {{$item->category->title ?? $item->category->name}}
              </h5>
              @if(isset($item->category->url) && !empty($item->category->url))
            </a>
          @endif
        </div>
      @endif
      @if($withSummary && ( isset($item->summary) || isset($item->description) || isset($item->custom_html)) )
        <div class="col-12 {{$orderClasses["summary"] ?? 'order-4'}} item-summary {{$summaryAlign}}">
          @if(isset($item->url) && !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div class="summary {{$summaryTextWeight}} {{$summaryColor}} {{$summaryMarginT}} {{$summaryMarginB}} {{$contentMarginInsideX}}">
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
            <a href="{{$item->url}}" class="btn btn{{strpos($buttonLayout,'outline') !== false ? '-outline' : ''}}-{{$buttonColor}} {{$buttonLayout}}  view-more-button {{$buttonMarginT}} {{$buttonMarginB}} {{$contentMarginInsideX}}" target="{{$target}}">
              @endif

                @if($buttonIconLR=="left") <i class="{{$buttonIcon != "" ? $buttonIcon." mr-1" : ""}}"></i>  @endif
                {{trans($viewMoreButtonLabel)}}
                @if($buttonIconLR=="right") <i class="{{$buttonIcon != "" ? $buttonIcon." ml-1" : ""}}"></i>  @endif

            @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
    </div>

  </div>
</div>


<style>
    .item-list-layout-6 .item-image picture:before {
        border-radius: {{$imageBorderRadio}}px;
        top: {{$imagePadding}}px;
        left: {{$imagePadding}}px;
        bottom: {{$imagePadding}}px;
        right: {{$imagePadding}}px;
    }
    .item-list-layout-6 .item-image picture {
        display: block !important;
        border-radius:{{$imageBorderRadio}}px;
        border-style: {{$imageBorderStyle}};
        border-width:{{$imageBorderWidth}}px;
        border-color:{{$imageBorderColor}};
    }
    .item-list-layout-6 .img-style {
        aspect-ratio:{{$imageAspect}};
        object-fit:{{$imageObject}};
        border-radius:{{$imageBorderRadio}}px;
        padding:{{$imagePadding}}px;
    }
    .item-list-layout-6 .card-item {
        padding:{{$contentPadding}}px;
        border-width: {{$contentBorder==false ? 0 : 1}}px;
        border-style: solid;
        border-color: {{$contentBorderColor}};
        border-radius: {{$contentBorderRounded}}px;
        @if(!$contentBorderShadowsHover)
        box-shadow: {{$contentBorderShadows}};
        @endif
    }
    .item-list-layout-6 .card-item:hover {
        @if($contentBorderShadowsHover)
            box-shadow: {{$contentBorderShadows}};
        @endif
    }

    .item-list-layout-6 .item-title .title {
        font-size: {{$titleTextSize}}px;
    }
    .item-list-layout-6 .item-summary .summary {
        font-size: {{$summaryTextSize}}px;
    }
    .item-list-layout-6 .item-category .category {
        font-size: {{$categoryTextSize}}px;
    }
    .item-list-layout-6 .item-created-date .created-date {
        font-size: {{$createdDateTextSize}}px;
    }
    .item-list-layout-6 .item-view-more-button .view-more-button {

    }
</style>



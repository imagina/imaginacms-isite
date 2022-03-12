@switch($imagePosition)
  @case('1')
  @php $row=""; $col1=""; $col2="image-overlay item-border";  @endphp
  @break
  @case('2')
  @php $row="row item-border"; $col1="col-lg-6 px-0"; $col2="col-lg-6";  @endphp
  @break
  @case('3')
  @php $row="row item-border"; $col1="col-lg-6 order-1 px-0"; $col2="col-lg-6 order-0"; @endphp
  @break
@endswitch

<div class="item-layout item-list-layout-7 position-relative">
  <x-isite::edit-link link="{{$editLink}}{{$item->id}}" tooltip="{{$tooltipEditLink}}"/>
  <div class="card-item {{$row}}">
    @if(method_exists ( $item, "mediaFiles" ) )
      <div
        class="item-image {{$col1}} {{$imagePositionVertical}} @if($withImageOpacity) {{$imageOpacityColor}} {{$imageOpacityDirection}} @endif">
        <x-media::single-image :alt="$item->title ?? $item->name" :title="$item->title ?? $item->name" :
                               :url="$item->url ?? null" :isMedia="true" width="100%" :target="$target"
                               imgClasses="img-style"
                               :mediaFiles="$item->mediaFiles()" :zone="$mediaImage ?? 'mainimage'"/>
      </div>
    @endif
    <div class="item-content {{$col2}} {{$contentPositionVertical}}">

      @if($withTitle)
        <div class=" {{$orderClasses["title"] ?? 'order-1'}} item-title {{$titleAlign}} ">
          @if(isset($item->url) && !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <h3
                class="title {{$titleTextWeight}} {{$titleTextTransform}} {{$titleColor}} {{$titleMarginT}} {{$titleMarginB}}">
                {{$item->title ?? $item->name}}
              </h3>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withCreatedDate && isset($item->created_at))
        <div class=" {{$orderClasses["date"] ?? 'order-2'}} item-created-date {{$createdDateAlign}}">
          @if(isset($item->url)&& !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div
                class="created-date {{$createdDateTextWeight}} {{$createdDateColor}} {{$createdDateMarginT}} {{$createdDateMarginB}}">
                {{ $item->created_at->format($formatCreatedDate) }}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withUser && ( isset($item->user)))
        <div class=" {{$orderClasses["user"] ?? 'order-3'}} item-user {{$userAlign}}">
          @if(isset($item->url)&& !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div
                class="created-date {{$userTextWeight}} {{$userColor}} {{$userMarginT}} {{$userMarginB}}">
                Por: {{$item->user->present()->fullname()}}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withCategory && isset($item->category->id))
        <div class=" {{$orderClasses["categoryTitle"] ?? 'order-4'}} item-category {{$categoryAlign}}">
          @if(isset($item->category->url) && !empty($item->category->url))
            <a href="{{$item->category->url}}" target="{{$target}}">
              @endif
              <h5 class="category {{$categoryTextWeight}} {{$categoryColor}} {{$categoryMarginT}} {{$categoryMarginB}}">
                {{$item->category->title ?? $item->category->name}}
              </h5>
              @if(isset($item->category->url) && !empty($item->category->url))
            </a>
          @endif
        </div>
      @endif
      @if($withSummary && ( isset($item->summary) || isset($item->description) || isset($item->custom_html)) )
        <div class=" {{$orderClasses["summary"] ?? 'order-5'}} item-summary {{$summaryAlign}}">
          @if(isset($item->url) && !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div class="summary {{$summaryTextWeight}} {{$summaryColor}} {{$summaryMarginT}} {{$summaryMarginB}} ">
                {!! Str::limit( $item->summary ?? $item->description ?? $item->custom_html ?? '', $numberCharactersSummary) !!}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withViewMoreButton)
        <div class="{{$orderClasses["viewMoreButton"] ?? 'order-6'}} item-view-more-button {{$buttonAlign}}">
          @if(isset($item->url) && !empty($item->url))
            <a href="{{$item->url}}"
               class="btn btn{{strpos($buttonLayout,'outline') !== false ? '-outline' : ''}}-{{$buttonColor}} {{$buttonLayout}} view-more-button {{$buttonMarginT}} {{$buttonMarginB}}"
               target="{{$target}}">
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
    .item-list-layout-7 .item-image picture:before {
        border-radius: {{$imageBorderRadio}}px;
        top: {{$imagePadding}}px;
        left: {{$imagePadding}}px;
        bottom: {{$imagePadding}}px;
        right: {{$imagePadding}}px;
    }

    .item-list-layout-7 .item-image picture {
        display: block !important;
        border-radius: {{$imageBorderRadio}}px;
        border-style: {{$imageBorderStyle}};
        border-width: {{$imageBorderWidth}}px;
        border-color: {{$imageBorderColor}};
    }

    .item-list-layout-7 .img-style {
        aspect-ratio: {{$imageAspect}};
        object-fit: {{$imageObject}};
        border-radius: {{$imageBorderRadio}}px;
        padding: {{$imagePadding}}px;
    }

    .item-list-layout-7 .item-border {
        padding: {{$contentPadding}}px;
        border-width: {{$contentBorder==false ? 0 : 1}}px;
        border-style: solid;
        border-color: {{$contentBorderColor}};
        border-radius: {{$contentBorderRounded}}px;
      @if(!$contentBorderShadowsHover)
   box-shadow: {{$contentBorderShadows}};
    @endif



    }

    .item-list-layout-7 .item-border:hover {
      @if($contentBorderShadowsHover)
   box-shadow: {{$contentBorderShadows}};
    @endif



    }

    .item-list-layout-7 .item-title .title {
        font-size: {{$titleTextSize}}px;
    }

    .item-list-layout-7 .item-summary .summary {
        font-size: {{$summaryTextSize}}px;
    }

    .item-list-layout-7 .item-category .category {
        font-size: {{$categoryTextSize}}px;
    }

    .item-list-layout-7 .item-created-date .created-date {
        font-size: {{$createdDateTextSize}}px;
    }
</style>
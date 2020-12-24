<div class="item-layout list-item-layout-1">
  <div class="card card-category bg-white border-0">
  
        <div class="row align-items-center">
          <div class="col-12">
          
            <x-media::single-image :alt="$item->title ?? $item->name" :title="$item->title ?? $item->name" :
                                  url="$item->url ?? null" :isMedia="true"
                                  :mediaFiles="$item->mediaFiles()" :zone="$mediaImage ?? 'mainimage'"/>
            
          </div>
          <div class="col-12">
            @if(isset($item->url))
              <a href="{{$item->url}}">
                @endif
            <h3 class="title">
              {{$item->title ?? $item->name}}
            </h3>
                @if(isset($item->url))
              </a>
            @endif
          </div>
          @if(isset($item->category->id))
            <div class="col-12 item-category-title">
              @if(isset($item->category->url))
                <a href="{{$item->category->url}}">
                  @endif
              <h5 class="my-4">
                {{$item->category->title ?? $item->category->name}}
              </h5>
                  @if(isset($item->category->url))
                </a>
              @endif
            </div>
          @endif
          @if(isset($item->summary) || isset($item->description))
            <div class="col-12 item-summary">
              @if(isset($item->url))
                <a href="{{$item->url}}">
                  @endif
              <div class="my-4">
                {!! $item->summary ?? $item->description ?? ''!!}
              </div>
                  @if(isset($item->url))
                </a>
              @endif
            </div>
          @endif
          @if($withViewMoreButton)
            <div class="col-12 item-view-more-button">
              @if(isset($item->url))
                <a href="{{$item->url}}" class="btn">
                  @endif
                  {{trans($viewMoreButtonLabel)}}
                  @if(isset($item->url))
                </a>
              @endif
            </div>
          @endif
        </div>
  
  </div>
</div>
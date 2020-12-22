<div class="item-layout list-item-layout-2">
  <div class="card card-category bg-white border-0">
    @if(isset($item->url))
      <a href="{{$item->url}}">
    @endif
        <div class="row align-items-center">
          <div class="col">
            <div class="fondo position-relative text-center p-3">
              <x-media::single-image :alt="$item->title ?? $item->name" :title="$item->title ?? $item->name" :
                                    url="$item->url ?? null" :isMedia="true"
                                    :mediaFiles="$item->mediaFiles()" :zone="$mediaImage ?? 'mainimage'"/>
            </div>
          </div>
          <div class="col">
            <h5 class="title my-4">
              {{$item->title ?? $item->name}}
            </h5>
          </div>
        </div>
    @if(isset($item->url))
      </a>
    @endif
  </div>
</div>
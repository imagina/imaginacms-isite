<div class='mark-popup mark-popup-layout-1'>
@foreach($items as $item)
    <div class="mark-popup-card">
        <div class="mark-popup-picture">
          <x-media::single-image :alt="$item->title"
                                 :title="$item->title"
                                 :isMedia="true"
                                 imgClasses="mark-popup-img"
                                 :mediaFiles="$item->mediaFiles()"/>
        </div>
        <div class="mark-popup-body">
            <div class="row no-gutters">
                <div class="col-auto mr-2">
                    @foreach($item->categories as $category)
                        @if($category->parent_id == 2)
                            <i class="fa-solid fa-road icon"></i>
                            <div class="mark-popup-small"> {{$category->title}}</div>
                        @endif
                    @endforeach
                </div>
                <div class="col">
                    @if(!empty($item->options->bpni))
                    <div class="mark-popup-title">BPIN</div>
                    <div class="mark-popup-text">{{$item->options->bpni}}</div>
                    @endif
                    @if(!empty($item->min_price))
                     <div class="mark-popup-title">VALOR</div>
                        <div class="mark-popup-text text-color">{{"$" . number_format($item->min_price, 0, ",", ".")}}</div>
                    @endif
                </div>
                @if(isset($item->city->name))
                <div class="col-12">
                    <div class="mark-popup-footer">
                        <i class="fa fa-map-marker"></i>
                        {{$item->city->name}}, {{$item->province->name ?? ""}}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
</div>
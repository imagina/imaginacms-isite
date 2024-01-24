<div class="mark-popup mark-popup-layout-1">
    <div class="row no-gutters align-items-center">
        <div class="col-auto {{ count($items)>1 ? '' : 'd-none' }}">
            <a class="mark-popup-btn-left" href="#carouselMarkPopup{{$items[0]->id}}" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col">
            <div id="carouselMarkPopup{{$items[0]->id}}" class="carousel slide mark-popup-slider" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($items as $index => $item)
                        <div class="carousel-item @if($index === 0) active @endif">
                            <div class="mark-popup-card">
                                <div class="mark-popup-picture">
                                    <x-media::single-image :alt="$item->title"
                                                           :title="$item->title"
                                                           :url="$item->url ?? null"
                                                           :isMedia="true"
                                                           imgClasses="mark-popup-img"
                                                           :mediaFiles="$item->mediaFiles()"/>
                                </div>
                                <div class="mark-popup-body">
                                    <a href="{{$item->url}}">
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
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-auto {{ count($items)>1 ? '' : 'd-none' }}">
            <a class="mark-popup-btn-right" href="#carouselMarkPopup{{$items[0]->id}}" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
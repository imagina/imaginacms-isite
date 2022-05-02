<div id="{{ $id }}" class="{{ $class }} lists-layout-4">
    <div class="row">
        @if($title!=="")
            <div class="col-12">
                <div class="title-section {{$titleAlign}}">
                    <h2 class="title {{$titleColor}} {{$titleWeight}} {{$titleTransform}} mb-0" style="font-size: {{$titleSize}}px;">
                        @if($titleVineta) <i class="{{$titleVineta}} {{$titleVinetaColor}} mr-1"></i>  @endif
                        <span> {!! $title !!}</span>
                    </h2>
                </div>
                <hr class="{{$titleLineMarginY}}">
            </div>

        @endif

        <div class="list-column-1 {{$columnLeft}} {{ $orderColumnMain==1 ? 'order-1':'' }}">
            @include("isite::frontend.partials.item",["itemLayout" => $itemComponentAttributesMain['layout'], "itemComponentAttributes" => $itemComponentAttributesMain, "item" => $items[0]])
        </div>
        <div class="list-column-2 {{$columnRight}}">
            @if($positionContent=="top" && $content)
                <div class="mb-4">
                    <x-media::single-image :url="$contentUrl ?? null" :setting="$content"  :alt="$title ?? ''" imgClasses="list-image-bottom"/>
                    <x-isite::edit-link :link="'/iadmin/#/site/index/?settingName='.$content"/>
                </div>
            @endif
            <div class="list-extra">
                @foreach ($items as $key => $item)
                    @if($key > 0)
                        <div class="list-extra-item mb-3">
                            @include("isite::frontend.partials.item",["itemLayout" => $itemComponentAttributesList['layout'],"itemComponentAttributes" => $itemComponentAttributesList])
                        </div>
                    @endif
                @endforeach

            </div>
            @if($positionContent=="bottom" && $content)
                <div class="mt-4">
                    <x-media::single-image :url="$contentUrl ?? null" :setting="$content"  :alt="$title ?? ''" imgClasses="list-image-bottom"/>
                    <x-isite::edit-link :link="'/iadmin/#/site/index/?settingName='.$content"/>
                </div>
            @endif
        </div>
    </div>
</div>
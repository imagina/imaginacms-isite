<div id="{{ $id }}" class="{{ $class }} lists-layout-5">
    @if($title!=="")
    <div class="row">
            <div class="col-12">
                <div class="title-section {{$textAlign}}" @if($textPosition==3) style="display: flex; flex-direction: column;" @endif>
                    @if($title!=="")
                        @if($titleUrl)
                            <a href="{{$titleUrl}}" target="{{$titleTarget}}" style="text-decoration: none;">
                                @endif
                                <h2 class="title {{$titleClasses}} {{ $textPosition==3 ? 'order-1':'' }} {{$titleColor}} {{$titleWeight}} {{$titleTransform}}" style="font-size: {{$titleSize}}px; letter-spacing: {{$titleLetterSpacing}};">
                                    @if($titleVineta) <i class="{{$titleVineta}} {{$titleVinetaColor}} mr-1"></i>  @endif
                                    <span> {!! $title !!}</span>
                                </h2>
                                @if($titleUrl)
                            </a>
                        @endif
                    @endif
                    @if($subtitle!=="" && $textPosition!=1)
                        <h3 class="subtitle {{$subtitleClasses}} {{$subtitleColor}} {{$subtitleWeight}} {{$subtitleTransform}}" style="font-size: {{$subtitleSize}}px; letter-spacing: {{$subtitleLetterSpacing}};">
                            {!! $subtitle !!}
                        </h3>
                    @endif
                </div>
                <hr class="{{$titleLineMarginY}}">
            </div>
        </div>
    @endif
    <div class="row">
    @foreach ($items as $key => $item)
        <div class="{{$columnLayout[$key%count($columnLayout)]}}">
            @include("isite::frontend.partials.item",["itemLayout" => $itemComponentAttributes['layout'],"itemComponentAttributes" => $itemComponentAttributes])
        </div>
    @endforeach
    </div>
</div>
<div id="{{ $id }}" class="{{ $class }} lists-layout-4">
    @if($title!=="" || $subtitle!=="")
    <div class="{{$titleRow}} row-title">
      <div class="{{$titleColumn}}">
        <div class="title-section {{$textAlign}} @if($textPosition==3) d-flex flex-column @endif ">
          @if($title!=="")
            @if($titleUrl)
              <a href="{{$titleUrl}}" target="{{$titleTarget}}" class="text-decoration-none">
                @endif
                <h2 class="title {{$titleClasses}} {{ $textPosition==3 ? 'order-1':'' }} {{$titleColor}} {{$titleWeight}} {{$titleTransform}}">
                  @if($titleVineta) <i class="{{$titleVineta}} {{$titleVinetaColor}} mr-1"></i>  @endif
                  <span> {!! $title !!}</span>
                </h2>
                @if($titleUrl)
              </a>
            @endif
          @endif
          @if($subtitle!=="" && $textPosition!=1)
            <h3 class="subtitle {{$subtitleClasses}} {{$subtitleColor}} {{$subtitleWeight}} {{$subtitleTransform}}">
              {!! $subtitle !!}
            </h3>
          @endif
        </div>
        <hr class="{{$titleLineMarginY}}">
      </div>
    </div>
    @endif
    <div class="{{$itemRow}} row-item">
        <div class="list-column-1 {{$columnLeft}} {{ $orderColumnMain==1 ? 'order-1':'' }}">
            @include("isite::frontend.partials.item",["itemLayout" => $itemComponentAttributesMain['layout'], "itemComponentAttributes" => $itemComponentAttributesMain, "item" => $items[0]])
        </div>
        <div class="list-column-2 {{$columnRight}}">
            @if(!empty($preListContentView))
                <div class="mb-4">
                    @include($preListContentView)
                </div>
            @endif
            <div class="list-extra {{$listExtra}}">
                @foreach ($items as $key => $item)
                    @if($key > 0)
                        <div class="list-extra-item {{$listExtraItem[$key%count($listExtraItem)]}}">
                            @include("isite::frontend.partials.item",["itemLayout" => $itemComponentAttributes['layout'],"itemComponentAttributes" => $itemComponentAttributes])
                        </div>
                    @endif
                @endforeach

            </div>
              @if(!empty($postListContentView))
                <div class="mb-4">
                  @include($postListContentView)
                </div>
              @endif
        </div>
    </div>
</div>
<style>
  #{{$id}} .title-section .title {
    font-size: {{$titleSize}}px;
    letter-spacing: {{$titleLetterSpacing}}px;
  }
  #{{$id}} .title-section .subtitle {
     font-size: {{$subtitleSize}}px;
     letter-spacing: {{$subtitleLetterSpacing}}px;
   }
  @if($withLineTitle==1)
  #{{$id}} .title-section .title:after {
         content: '';
         display: block;
       @foreach($lineTitleConfig as $key => $line)
       {{$key}}: {{$line}};
       @endforeach
  }
  @endif
  @if($withLineTitle==2)
  #{{$id}} .title-section .subtitle:after {
           content: '';
           display: block;
         @foreach($lineTitleConfig as $key => $line)
        {{$key}}: {{$line}};
         @endforeach
  }
  @endif
</style>
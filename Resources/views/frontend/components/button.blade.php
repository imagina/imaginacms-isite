@if($style=="")
    @php $var="text-".$color @endphp
@else
    @php
        $var1 = str_contains($style,'outline') ? "-outline-" : "-";
        $var= "button".$var1.$color;
    @endphp
@endif
<{{ $disabled  ? "button" : "a" }}
   id="{{$idButton}}" role="button" aria-label="{{ !empty($label) ? $label : "icon" }}" class="button-base {{$var}} {{$buttonClasses}} @if(!$withLabel && $withIcon) button-icon @endif"
   {{ !empty($onclick) ? "onclick=".$onclick : "" }} {{ !empty($href) ? "href=".$href : "" }} {{ $disabled  ? "disabled" : "" }}
        {{ !empty($target) ? "target=".$target : "" }} {{ !empty($dataItemId) ? "data-item-id=".$dataItemId : "" }} {{ !empty($dataTarget) ? "data-target=".$dataTarget : "" }} {{ !empty($dataTarget) ? "data-toggle=modal" : "" }}>
  @if($withIcon && $iconPosition=="left")
    <i class="{{$iconClass}}"></i>
  @endif
  @if($withLabel)
    <span> {{$label}} </span>
  @endif
  @if($withIcon && $iconPosition=="right")
      <i class="{{$iconClass}}"></i>
  @endif
</{{ $disabled  ? "button" : "a" }}>
<style>
    #{{$idButton}} {
        font-size: {{$sizeLabel}}px;
        line-height: {{$sizeLabel}}px;
        @if(!empty($styleBlock)) {!! $styleBlock !!} @endif
        @if(!empty($styleBlockHover)) &:hover { {!! $styleBlockHover !!} } @endif
    }
    @if($withIcon)
    #{{$idButton}} i {
        color: {{$iconColor}};
    }
    @endif
</style>
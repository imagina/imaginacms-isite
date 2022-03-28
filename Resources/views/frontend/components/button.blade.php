@if($style=="")
    @php $var="text-".$color @endphp
@else
    @php
        $var1 = str_contains($style,'outline') ? "-outline-" : "-";
        $var= "button".$var1.$color;
    @endphp
@endif
<a class="button-base {{$var}} {{$buttonClasses}}"
   {{ !empty($onclick) ? "onclick=".$onclick : "" }} {{ !empty($href) ? "href=".$href : "" }}
        {{ !empty($target) ? "target=".$target : "" }} {{ !empty($dataPid) ? "data-item-id=".$dataPid : "" }} style="font-size: {{$sizeLabel}}px; line-height: {{$sizeLabel}}px;">
  @if($withIcon && $iconPosition=="left")
    <i class="{{$iconClass}}"></i>
  @endif
  @if($withLabel)
    <span> {{$label}} </span>
  @endif
  @if($withIcon && $iconPosition=="right")
      <i class="{{$iconClass}}"></i>
  @endif
</a>



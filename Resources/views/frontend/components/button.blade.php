<a class="btn btn-sm btn{{Str::contains($style, 'outline') ? "-outline" : ""}}-primary {{$buttonClasses}}"
   {{ !empty($onclick) ? "onclick=".$onclick : "" }}>
  @if($withIcon)
    <i class="{{$iconClass}}"></i>
  @endif
  @if($withLabel)
    {{$label}}
  @endif
</a>



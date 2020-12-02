@foreach($items as $name=>$value)
  @if(!empty($value))
    <a href="{{ $value }}" target="_blank">
      <span class="fa-stack fa-lg">
        <i class="fa fa-{{ $type }} fa-stack-2x text-primary"></i>
        <i class="fa fa-{{ $name }} fa-stack-1x @if($type=='square-o') text-primary @else text-white @endif"></i>
      </span>
    </a>
  @endif
@endforeach

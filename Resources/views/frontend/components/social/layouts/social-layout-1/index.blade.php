@foreach($items as $name=>$value)
  @if(!empty($value))
    <a href="{{ $value }}" target="_blank">
      @if($type)
      <span class="fa-stack fa-lg">
        <i class="fa fa-{{ $type }} {{ strpos($name, 'fa') ? 'fa-stack-2x' : '' }} text-primary"></i>
        <i class="{{ $name }} {{ strpos($name, 'fa') ? 'fa-stack-1x' : '' }} @if($type=='square-o' || empty($type)) text-primary @else text-white @endif"></i>
      </span>
      @else
        <i class="{{ $name }} text-primary"></i>
      @endif
    </a>
  @endif
@endforeach

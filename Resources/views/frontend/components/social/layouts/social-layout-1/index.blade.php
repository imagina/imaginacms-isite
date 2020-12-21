<div class="d-inline-block social-{{ $position }}" id="{{ $id }}">
  @foreach($items as $name=>$value)
    @if(!empty($value))
      <a href="{{ $value }}" target="_blank">
        @if($type)
        <span class="fa-stack fa-lg">
          <i class="fa fa-{{ $type }} {{ strpos($name, 'fa') ? 'fa-stack-2x' : '' }}"></i>
          <i class="{{ $name }} {{ strpos($name, 'fa') ? 'fa-stack-1x' : '' }} @if($type=='square-o' || empty($type))  @else text-white @endif"></i>
        </span>
        @else
          <i class="{{ $name }}"></i>
        @endif
      </a>
    @endif
  @endforeach
</div>

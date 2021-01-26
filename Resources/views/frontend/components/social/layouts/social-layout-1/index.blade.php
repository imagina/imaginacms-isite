<div class="d-inline-block social-{{ $position }}" id="{{ $id }}">
  @foreach($items as $name=>$value)
    @if(!empty($value))
      <a href="{{ $value }}" target="_blank">
        @if($type)
        <span class="fa-stack fa-lg">
          <i class="fa fa-{{ $type }} fa-stack-{{ $size }}"></i>
          <i class="{{ $name }} fa-stack-1x @if($type=='square-o' || empty($type))  @else text-white @endif"></i>
        </span>
        @else
          <i class="{{ $name }} fa-{{ $size }}"></i>
        @endif
      </a>
    @endif
  @endforeach
  <x-isite::whatsapp :parentAttributes="$whatsappAttributes" layout="whatsapp-layout-2"/>
</div>


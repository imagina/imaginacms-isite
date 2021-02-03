<!--Validation to show icon or dropdown -->
@if(count($items) <= 1)
  @foreach($items as $key => $item)
    <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}" class="whatsapp-layout-2" target="_blank">
      @if($type)
        <span class="fa-stack fa-{{ $size }}">
          <i class="fa fa-{{ $type }} fa-stack-2x text-white"></i>
          <i class="icon-whatsapp {{ $icon }} fa-stack-1x @if($type=='square-o' || $type=='circle-thin' || empty($type))  @else text-white @endif"></i>
        </span>
      @else
        <i class="icon-whatsapp {{ $icon }} fa-{{ $size }} text-white"></i>
      @endif
    </a>
  @endforeach
@else
  <div class="btn-group {{$alignment}} whatsapp-layout-2">
    <a id="dropdownMenuWhatsapp" type="button" class="btn dropdown-toggle{{ count($parentAttributes) > 0 ? ' p-0' : '' }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if($type)
            <span class="fa-stack fa-{{ $size }}">
          <i class="fa fa-{{ $type }} fa-stack-2x"></i>
          <i class="icon-whatsapp {{ $icon }} fa-stack-1x @if($type=='square-o' || $type=='circle-thin' || empty($type))  @else text-white @endif"></i>
        </span>
        @else
            <i class="icon-whatsapp {{ $icon }} fa-{{ $size }}"></i>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-whatsapp">
      <!-- Dropdown menu links -->
      @foreach($items as $key => $item)
        @if(!empty($item->callingCode) && !empty($item->number))
          <div class="number-whatsapp">
              <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}"
                 target="_blank">
                  <p>
                    <span>{{ $item->label.': ' ?? '' }}</span>
                  </p>
                  <p>
                    <span>{{ $item->formattedNumber }}</span>
                  </p>
              </a>
          </div>
        @endif
      @endforeach
    </div>
  </div>
@endif

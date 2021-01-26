<!--Validation to show icon or dropdown -->
@if(count($items) <= 1)
  @foreach($items as $key => $item)
    <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}" class="whatsapp-layout-2" target="_blank">
      <i class="icon-whatsapp {{ $icon }}"></i>
    </a>
  @endforeach
@else
  <div class="btn-group {{$alignment}} whatsapp-layout-2">
    <a id="dropdownMenuWhatsapp" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="icon-whatsapp {{ $icon }}"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-whatsapp">
      <!-- Dropdown menu links -->
      @foreach($items as $key => $item)
        @if(!empty($item->callingCode) && !empty($item->number))
          <div class="number-whatsapp">
            <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}"
               target="_blank">
              <span>{{ $item->formattedNumber }}</span>
            </a>
          </div>
        @endif
      @endforeach
    </div>
  </div>
@endif

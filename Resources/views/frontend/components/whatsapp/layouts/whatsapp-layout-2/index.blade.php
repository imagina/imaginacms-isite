<!--Validation to show icon or dropdown -->
@if(count($items) <= 1)
  @foreach($items as $key => $item)
    <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}" target="_blank">
      <i class="icon-whatsapp {{ $icon }}"></i>
    </a>
  @endforeach
@else
  <div class="dropdown d-inline-block dropdown-whatsapp">
    <!--Icon dropdown-->
    <a class="dropdown-toggle" type="button" id="dropdownMenuWhatsapp" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
      <i class="icon-whatsapp {{ $icon }}"></i>
    </a>
    <!--Numbers to show-->
    <div class="dropdown-menu {{$alignment}} dropdown-menu-whatsapp"
         aria-labelledby="dropdownMenuWhatsapp">
      @foreach($items as $key => $item)
        @if(!empty($item->callingCode) && !empty($item->number))
          <div class="number-whatsapp">
            <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}"
               target="_blank">
              {{ $item->formattedNumber }}
            </a>
          </div>
        @endif
      @endforeach
    </div>
  </div>
@endif

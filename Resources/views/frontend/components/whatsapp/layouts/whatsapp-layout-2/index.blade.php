<div class="dropdown d-inline-block dropdown-whatsapp">
  <a class="dropdown-toggle" type="button" id="dropdownMenuWhatsapp" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
    <i class="{{ $icon }}"></i>
  </a>
  <div class="dropdown-menu {{$alignment}} dropdown-menu-whatsapp" aria-labelledby="dropdownMenudropdownMenuWhatsapp">
    @foreach($items as $key => $item)
      @if(!empty($item->callingCode) && !empty($item->number))
       <div class="number-whatsapp">
         <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}" target="_blank">
         <span>{{ $item->formattedNumber }}</span>
         </a>
       </div>
      @endif
    @endforeach
  </div>
</div>

<div class="row" id="{{ $id }}">
    @if($title)
        <div class="col-12">
            <h3>{{ $title }}</h3>
        </div>
    @endif
    @foreach($items as $item)
        @if(!empty($item->callingCode) && !empty($item->number))
            <div class="col-12">
              <i class="{{ $icon }}"></i>
                <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}" target="_blank">
                   {{ $item->formattedNumber }}
                </a>
            </div>
        @endif
    @endforeach
</div>

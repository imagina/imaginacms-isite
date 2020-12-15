<div class="row py-3" id="{{ $id }}">
    @if($title)
        <div class="col-12">
            <h3>{{ $title }}</h3>
        </div>
    @endif
    @foreach($items as $item)
        @if(!empty($item->callingCode) && !empty($item->number))
            <div class="col-12">
                <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}" target="_blank">
                    <i class="{{ $icon }}"></i> {{ $item->formattedNumber }}
                </a>
            </div>
        @endif
    @endforeach
</div>

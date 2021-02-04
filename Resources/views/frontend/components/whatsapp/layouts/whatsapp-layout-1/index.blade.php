<div class="row" id="{{ $id }}">
    @if($title)
        <div class="col-12">
            <h3>{{ $title }}</h3>
        </div>
    @endif
    @foreach($items as $item)
        @if(!empty($item->callingCode) && !empty($item->number))
            <div class="col-12">
                @if($type)
                    <span class="fa-stack fa-{{ $size }}">
                      <i class="fa fa-{{ $type }} fa-stack-2x"></i>
                      <i class="icon-whatsapp {{ $icon }} fa-stack-1x @if($type=='square-o' || $type=='circle-thin' || empty($type)) @else text-white @endif"></i>
                    </span>
                @else
                    <i class="{{ $icon }} fa-{{ $size }}"></i>
                @endif
                <a href="https://wa.me/{{ $item->callingCode }}{{ $item->number }}?text={{ $item->message }}" target="_blank">
                    {{ isset($item->label) ? $item->label.': ' : '' }} {{ $item->formattedNumber }}
                </a>
            </div>
        @endif
    @endforeach
</div>

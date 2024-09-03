<div class="{{$orderClasses["bodyExtra"] ?? 'order-4'}} page-body-extra">
    <div class="body-extra {{$bodyExtraColorByClass}} {{$bodyExtraAlign}} {{$bodyExtraClass}}">
        @foreach($bodyExtra as $extra)
            <div class="body-extra-mini {{$bodyExtraMiniClass}}">
                {!! $page->options->{$extra} ?? '' !!}
            </div>
        @endforeach
    </div>
</div>
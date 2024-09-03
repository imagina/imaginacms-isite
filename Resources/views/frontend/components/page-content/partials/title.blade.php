<div class="{{$orderClasses["title"] ?? 'order-0'}} page-title">
    <h2 class="title {{$titleColorByClass}} {{$titleAlign}} {{$titleClass}}">
        @if($titleIconPosition == 1 || $titleIconPosition == 3) <i class="{{$titleIcon}} {{$titleIconPosition==3 ? 'd-block': ''}}"></i>  @endif
        <span> {{ $page->title ?? 'titulo' }}</span>
        @if($titleIconPosition == 2 || $titleIconPosition == 4) <i class="{{$titleIcon}} {{$titleIconPosition==4 ? 'd-block': ''}}"></i>  @endif
    </h2>
</div>

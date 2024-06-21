<div class="{{$orderClasses["media"] ?? 'order-1'}} page-image">
    <div class="image">
        @if(!is_null($page->mediaFiles()) && !is_null($page->mediaFiles()->mainimage->id))
        <x-media::single-image
                :title="$page->title ?? ''"
                :isMedia="true"
                width="100%"
                :withVideoControls="$videoControls" :loopVideo="$videoLoop"
                :autoplayVideo="$videoAutoplay" :mutedVideo="$videoMuted"
                :mediaFiles="$page->mediaFiles()"
                imgClasses="{{$imageClass}} img-style"
        />
        @else
            <div class="img-style {{$imageClass}}"></div>
        @endif
    </div>
</div>
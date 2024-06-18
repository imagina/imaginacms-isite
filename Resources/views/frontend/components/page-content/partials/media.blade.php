<div class="{{$orderClasses["media"] ?? 'order-1'}} page-image">
    <div class="image">
        <x-media::single-image
                :title="$page->title ?? ''"
                :isMedia="true"
                width="100%"
                :withVideoControls="$videoControls" :loopVideo="$videoLoop"
                :autoplayVideo="$videoAutoplay" :mutedVideo="$videoMuted"
                :mediaFiles="$page->mediaFiles() ?? null"
                imgClasses="{{$imageClass}} img-style"
        />
    </div>
</div>
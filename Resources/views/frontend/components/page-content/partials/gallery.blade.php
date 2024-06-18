@php
    $navText = [ "<i class='$galleryNavIcons[0]'></i>", "<i class='$galleryNavIcons[1]'></i>" ];
@endphp
<div class="{{$orderClasses["gallery"] ?? 'order-3'}} page-gallery">
    <div class="gallery {{$galleryClass}}">
        @if(!empty($page->mediaFiles()->gallery))
            <x-media::gallery
                    :layout="$galleryLayout"
                    :responsive="$galleryResponsive"
                    :dots="$galleryDots"
                    :nav="$galleryNav"
                    :navText="$navText"
                    :mediaFiles="$page->mediaFiles()" />
        @endif
    </div>
</div>

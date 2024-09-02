<section id="{{$id}}" class="page-content">
    <div class="{{$row}}">
        @if($withTitle==1)
            @include('isite::frontend.components.page-content.partials.title')
        @endif

        @if($withBody)
            <div class="{{$orderClasses["body"] ?? 'order-2'}} page-body">
                <div class="body-content {{$bodyContentInside}}">
                    @if($withTitle==2)
                        @include('isite::frontend.components.page-content.partials.title')
                    @endif
                    @if($withMedia==2)
                            @include('isite::frontend.components.page-content.partials.media')
                    @endif
                    @if($withGallery==2)
                            @include('isite::frontend.components.page-content.partials.gallery')
                    @endif
                    @if($withBodyExtra==2 && !is_null($bodyExtra))
                            @include('isite::frontend.components.page-content.partials.body-extra')
                    @endif
                    @if($withVideoExternal==2 && !empty($videoExternal))
                            @include('isite::frontend.components.page-content.partials.video-extra')
                    @endif
                </div>

                <div class="body {{$bodyColorByClass}} {{$bodyAlign}} {{$bodyClass}}">
                    {!! $page->body ?? 'Lorem, ipsum dolor sit' !!}
                </div>
            </div>
        @endif

        @if($withMedia==1)
            @include('isite::frontend.components.page-content.partials.media')
        @endif
        @if($withGallery==1)
            @include('isite::frontend.components.page-content.partials.gallery')
        @endif
        @if($withBodyExtra==1 && !is_null($bodyExtra))
            @include('isite::frontend.components.page-content.partials.body-extra')
        @endif
        @if($withVideoExternal==1 && !empty($videoExternal))
            @include('isite::frontend.components.page-content.partials.video-extra')
        @endif

       @if($withShare)
       <div class="{{$orderClasses["share"] ?? 'order-6'}} page-share">
           <div class="share {{$shareClass}}">
               <div class="{{$shareFontClass}}">{{trans('iblog::common.social.share')}}:</div>
               <div class="sharethis-inline-share-buttons"></div>
               <style>
                   #st-1 {
                       z-index: 8;
                   }
               </style>
           </div>
       </div>
       @endif
   </div>
</section>
<style>
@if($withTitle)
#{{$id}} .page-title .title {
   @if($titleColorByClass=="text-custom")  color: {{$titleColor}}; @endif
   font-size: {{$titleFontSize}}px;
   letter-spacing: {{$titleLetterSpacing}};
   @if(!empty($titleStyle))
   {!!$titleStyle!!}
    @endif
}
@if(!empty($titleIconStyle))
#{{$id}} .page-title .title i {
 {!!$titleIconStyle!!}
}
@endif
@if($withLineTitle==1)
#{{$id}} .page-title .title:after {
     content: '';
     display: block;
     @foreach($lineTitleConfig as $key => $line)
     {{$key}}: {{$line}};
     @endforeach
}
@endif
@endif
@if($withMedia)
#{{$id}} .page-image .img-style,
#{{$id}} .page-image .cover-img {
    object-fit: {{$imageObjectFit}};
    object-position: {{$imageObjectPosicion}};
    aspect-ratio: {{$imageAspectRatio=='aspect-custom' ? $imageAspectRatioCustom : $imageAspectRatio}};
    @if(!empty($imageStyle))
    {!!$imageStyle!!}
    @endif
}
@endif
@if($withBody)
#{{$id}} .page-body .body {
@if($bodyColorByClass=="text-custom")  color: {{$bodyColor}}; @endif
    font-size: {{$bodyFontSize}}px;
     @if(!empty($bodyStyle))
     {!!$bodyStyle!!}
     @endif
}
@endif
@if($withGallery)
#{{$id}} .page-gallery .gallery {
     @if(!empty($galleryStyle))
     {!!$galleryStyle!!}
     @endif
     @if($galleryLayout != "gallery-layout-3")
     & img {
        object-fit: {{$galleryObjectFit}};
        object-position: {{$galleryObjectPosicion}};
        aspect-ratio: {{$galleryAspectRatio=='aspect-custom' ? $galleryAspectRatioCustom : $galleryAspectRatio}};
     }
     @endif
}
@if($galleryNav)
    #{{$id}} .page-gallery .gallery .owl-nav  {
        & i {
            font-size: {{$galleryNavSize}}px;
            color: {{$galleryNavColor}};
            &:hover {
                color: {{$galleryNavColorHover}};
            }
        }
        & [class*=owl-]:hover {
            background: transparent;
        }
        @if($galleryLayout=="gallery-layout-1")
            margin-top: 0;
            @if($galleryNavPosition==2)
            text-align: right;
            @endif
            @if($galleryNavPosition==3)
            text-align: left;
            @endif
            @if($galleryNavPosition==5)
            position: absolute;
            top: -{{$galleryNavSize + 15}}px;
            left: 0; right: 0;
            @endif
            @if($galleryNavPosition==6)
            position: absolute;
            top: -{{$galleryNavSize + 15}}px;
            @endif
            @if($galleryNavPosition==7)
            position: absolute;
            top: -{{$galleryNavSize + 15}}px;
            right: 0;
            @endif
        @endif
    }
    @if($galleryLayout=="gallery-layout-1" && $galleryNavPosition==4)
    @media (min-width: 768px) {
        #{{$id}} .page-gallery .gallery .owl-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            pointer-events: none;
            & .owl-prev,
            & .owl-next {
              background: none;
              border: none;
              pointer-events: all;
            }
            & .owl-prev {
              position: absolute;
              left: -{{$galleryNavSize + 10}}px;
            }
            & .owl-next {
              position: absolute;
              right: -{{$galleryNavSize + 10}}px;
            }
        }
    }
    @endif
    @if($galleryLayout=="gallery-layout-7")
    #{{$id}} .page-gallery .gallery .arrow i {
        color: {{$galleryNavColor}};
        &:hover {
            color: {{$galleryNavColorHover}};
        }
    }
    @endif
@endif
@if($galleryDots)

    @if($galleryDotsStyle=="dots-linear")
       @if(empty($galleryDotsStyleColor)) @php($galleryDotsStyleColor='primary') @endif
       @if(empty($galleryDotsSize)) @php($galleryDotsSize='25') @endif
       #{{$id}} .page-gallery .gallery .owl-dots .owl-dot span {
         width: {{$galleryDotsSize}}px;
         height: 5px;
         margin: 0 5px;
         border-radius: 0;
       }
       #{{$id}} .page-gallery .gallery .owl-dots .owl-dot.active span,
       #{{$id}} .page-gallery .gallery .owl-dots .owl-dot:hover span {
            background: var(--{{$galleryDotsStyleColor}});
       }
    @endif

    @if($galleryDotsStyle=="dots-circular")
        @if(empty($galleryDotsSize)) @php($galleryDotsSize='10') @endif
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot span {
             width: {{$galleryDotsSize}}px;
             height: {{$galleryDotsSize}}px;
        }
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot.active span,
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot:hover span {
             background:  var(--{{$galleryDotsStyleColor}});
        }
    @endif

    @if($galleryDotsStyle=="dots-square")
        @if(empty($galleryDotsSize)) @php($galleryDotsSize='10') @endif
        #{{$id}} .dots-square .owl-dots .owl-dot span {
             width: {{$galleryDotsSize}}px;
             height: {{$galleryDotsSize}}px;
             border-radius: 0;
        }
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot.active span,
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot:hover span {
             background:  var(--{{$galleryDotsStyleColor}});
        }
    @endif

    @if($galleryDotsStyle=="dots-oval")
        @if(empty($galleryDotsSize)) @php($galleryDotsSize='13') @endif
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot span {
             width: {{$galleryDotsSize}}px;
             height: 8px;
             border-radius: 10px;
        }
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot.active span,
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot:hover span {
             background:  var(--{{$galleryDotsStyleColor}});
        }
    @endif

    @if($galleryDotsStyle=="dots-circular-double" || $galleryDotsStyle=="dots-square-double")
        @if(empty($galleryDotsStyleColor)) @php($galleryDotsStyleColor='primary') @endif
        @if(empty($galleryDotsSize)) @php($galleryDotsSize='13') @endif
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot span {
             width: {{$galleryDotsSize}}px;
             height: {{$galleryDotsSize}}px;
             margin: 5px;
             border: 2px solid var(--{{$galleryDotsStyleColor}});
             background-color: var(--{{$galleryDotsStyleColor}});
             position: relative;
             background-clip: border-box;
             opacity: 1;
             flex: 0 1 auto;
             @if($galleryDotsStyle=="dots-square-double") border-radius: 0; @endif
        }
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot.active span {
             border: 2px solid var(--{{$galleryDotsStyleColor}});
             background-color: transparent;
        }
        #{{$id}} .page-gallery .gallery .owl-dots .owl-dot.active span:after{
             width: {{$galleryDotsSize - 8 }}px;
             height: {{$galleryDotsSize - 8 }}px;
             background-color: var(--{{$galleryDotsStyleColor}});
             bottom: 2px !important;
             left: 2px !important;
             content: "";
             position: absolute;
             @if($galleryDotsStyle=="dots-circular-double") border-radius: 50%; @endif
        }
    @endif

@endif
@endif
@if($withShare && !empty($shareStyle))
#{{$id}} .page-share .share {
{!!$shareStyle!!}
@endif
@if($withVideoExternal && !empty($videoExternalStyle))
#{{$id}} .page-video-external .video-external {
{!!$videoExternalStyle!!}
@endif
</style>
@section("scripts")
    @parent
    <script defer type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5fd9384eb64d610011fa8357&product=inline-share-buttons"
            async="async"></script>

@stop
<div class="video position-relative video-fancybox">
  <a data-fancybox="{{$article->category->slug}}"
     data-type="iframe" data-src="{{ $src }}"
     data-caption="{{$article->title ?? $article->name}}"
     class="video-link text-decoration-none fancybox-link">
    <i class="fa-brands fa-youtube icon-style fancybox-btn"></i>
  </a>
  <x-media::single-image :alt="$article->title ?? $article->name" :title="$article->title ?? $article->name"
                         :url="$withUrl ? $article->url ?? null : null" :isMedia="true" imgClasses="video-style"
                         :withVideoControls="false" :loopVideo="false"
                         :autoplayVideo="false" :mutedVideo="true"
                         :target="$target" :mediaFiles="$article->mediaFiles()"
                         imgStyles="width:{{$imageWidth}}% !important; height:{{$imageHeight}}; z-index: 1;"
                         :zone="$mediaImage ?? 'mainimage'"/>
</div>
@once
  <style>
    .video-link.fancybox-link{
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      width: 100%;
      height: 100%;
      cursor: pointer;
      z-index: 2;
    }

    .icon-style.fancybox-btn{
      color: #c4302b;
      font-size: 3vw;
      position: relative;
      z-index: 1;

      &:after{
        background-color: #ffffff;
        content: '';
        margin: auto;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: -1;
        width: 70%;
        height: 50%;
      }
    }

    .fancybox-caption__body{
      background: #ffff !important;
      display: inline-block;
      padding: 9px 15px;
      color: var(--dark) !important;
      font-size: 18px !important;
      border-radius: 5px;
    }

    @media (max-width: 768px){
      .icon-style.fancybox-btn{
        font-size: 5vw;
      }

      .fancybox-caption__body{
        font-size: 15px !important;
      }
    }
  </style>
@endonce

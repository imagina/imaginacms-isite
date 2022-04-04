@if(!$emptyItems)
<section id="{{$id}}" class="{{$owlBlockStyle}}">
    <div class="{{$containerFluid ? 'container-fluid': 'container'}}">

          <div class="row align-items-center @if($navPosition=='top-right') justify-content-end @endif @if($navPosition=="top-right" && $navPosition=="top-left" || $textAlign=='text-center') my-3 @endif">

            <div class="col px-0 {{ $navPosition=="top-left" ? 'order-1':'' }}"  @if($navPosition=="top-right" && $navPosition=="top-left" || $textAlign=='text-center') style="position: absolute; left: 0;" @endif>
              <div class="title-section {{$textAlign}}" @if($titlePosition==3) style="display: flex; flex-direction: column;" @endif>
                @if($title!=="")
                <h2 class="title {{ $titlePosition==3 ? 'order-1':'' }}">{!! $title !!}</h2>
                @endif
                @if($subTitle!=="" && $titlePosition!=1)
                  <h6 class="subtitle">
                    {!! $subTitle !!}
                  </h6>
                @endif
              </div>
            </div>

            @if($nav && $navPosition=="top-left" || $nav && $navPosition=="top-right")
              <div class="col-auto {{ $navPosition=="top-left" ? 'order-0 pl-0': 'pr-0' }}">

                <x-isite::button :style="$navStyleButton"
                                 :buttonClasses="'prevBtn d-inline-block my-2  '.$navSizeButton.' '.$navStyleButton"
                                 :withIcon="true"
                                 :iconClass="'fa fa-'.$navIcon.'-left'"
                                 :withLabel="false"
                                 :color="$navColor"
                                 :sizeLabel="$navSizeLabel"
                />

                <x-isite::button :style="$navStyleButton"
                                 :buttonClasses="'nextBtn d-inline-block my-2  '.$navSizeButton.' '.$navStyleButton"
                                 :withIcon="true"
                                 :iconClass="'fa fa-'.$navIcon.'-right'"
                                 :withLabel="false"
                                 :color="$navColor"
                                 :sizeLabel="$navSizeLabel"
                />
              </div>
            @endif
          </div>


      @if($nav && $navPosition=="top-center")
        <div class="text-center">

          <x-isite::button :style="$navStyleButton"
                           :buttonClasses="'prevBtn d-inline-block my-2 '.$navSizeButton.' '.$navStyleButton"
                           :withIcon="true"
                           :iconClass="'fa fa-'.$navIcon.'-left'"
                           :withLabel="false"
                           :color="$navColor"
                           :sizeLabel="$navSizeLabel"
          />

          <x-isite::button :style="$navStyleButton"
                           :buttonClasses="'nextBtn d-inline-block my-2  '.$navSizeButton.' '.$navStyleButton"
                           :withIcon="true"
                           :iconClass="'fa fa-'.$navIcon.'-right'"
                           :withLabel="false"
                           :color="$navColor"
                           :sizeLabel="$navSizeLabel"
          />


        </div>
      @endif



          @if($nav && $navPosition=="center")
          <div class="row wrapper">
            <div>

              <x-isite::button :style="$navStyleButton"
                               :buttonClasses="'prevBtn d-inline-block my-2  '.$navSizeButton.' '.$navStyleButton"
                               :withIcon="true"
                               :iconClass="'fa fa-'.$navIcon.'-left'"
                               :withLabel="false"
                               :color="$navColor"
                               :sizeLabel="$navSizeLabel"
              />
            </div>

          @endif

            <div class="@if($nav && $navPosition!="center") row py-3 @endif ">
              <div id="{{$id}}Carousel" class="owl-carousel owl-theme {{$dotsStyle}}">
                @php($x = 0) {{-- iterador de items --}}
                @php($j = 0) {{-- iterador de itemsBySlide --}}
                @while(isset($items[$x]))
                  @php($j = 0)
                  @if($itemsBySlide > 1)

                    <div class="items-by-slide">
                      @endif

                      @while(isset($items[$x + $j]) && $j<$itemsBySlide)

                        <x-dynamic-component :positionNumber="$x+$j" :component="$itemComponent" :item="$items[$x + $j]"
                                             :product="$items[$x + $j]" :layout="$itemLayout"
                                             :parentAttributes="$attributes" :editLink="$editLink"
                                             :tooltipEditLink="$tooltipEditLink"/>

                        @php($j++)
                      @endwhile
                      @if($itemsBySlide > 1)
                    </div>
                  @endif
                  @php($x+=$itemsBySlide)
                @endwhile
              </div>
            </div>

          @if($nav && $navPosition=="center")
            <div>
              <x-isite::button :style="$navStyleButton"
                               :buttonClasses="'nextBtn d-inline-block my-2  text-right '.$navSizeButton.' '.$navStyleButton"
                               :withIcon="true"
                               :iconClass="'fa fa-'.$navIcon.'-right'"
                               :withLabel="false"
                               :color="$navColor"
                               :sizeLabel="$navSizeLabel"
              />

            </div>
          </div>
          @endif


          @if($nav && $navPosition=="bottom")
            <div class="text-center">

              <x-isite::button :style="$navStyleButton"
                               :buttonClasses="'prevBtn d-inline-block my-2 '.$navSizeButton.' '.$navStyleButton"
                               :withIcon="true"
                               :iconClass="'fa fa-'.$navIcon.'-left'"
                               :withLabel="false"
                               :color="$navColor"
                               :sizeLabel="$navSizeLabel"
              />

              <x-isite::button :style="$navStyleButton"
                               :buttonClasses="'nextBtn d-inline-block my-2  '.$navSizeButton.' '.$navStyleButton"
                               :withIcon="true"
                               :iconClass="'fa fa-'.$navIcon.'-right'"
                               :withLabel="false"
                               :color="$navColor"
                               :sizeLabel="$navSizeLabel"
              />


            </div>
          @endif

    </div>
  </section>

  <script type="text/javascript" defer>
    function createOWL{{$id}}(){
      var owl = $('#{{$id}}Carousel');
      owl.trigger('destroy.owl.carousel');
      owl.owlCarousel({
        loop: {!! $loop ? 'true' : 'false' !!},
        lazyLoad: true,
        margin: {!! $margin !!},
        {!! !empty($navText) ? 'navText: '.$navText."," : "" !!}
        dots: {!! $dots ? 'true' : 'false' !!},
        responsiveClass: {!! $responsiveClass ? 'true' : 'false' !!},
        autoplay: {!! $autoplay ? 'true' : 'false' !!},
        autoplayHoverPause: {!! $autoplayHoverPause ? 'true' : 'false' !!},
        nav: false,
        center: {!! $center ? 'true' : 'false' !!},
        responsive: {!! $responsive !!}
      });
    
      $('#{{$id}} .nextBtn').click(function() {
        owl.trigger('next.owl.carousel');
      });
      $('#{{$id}} .prevBtn').click(function() {
        owl.trigger('prev.owl.carousel', [300]);
      });
      owl.trigger('refresh.owl.carousel');
    }
    document.addEventListener('DOMContentLoaded', function () {
      
      createOWL{{$id}}();
  
      window.addEventListener('owlRefreshed', () => {
        console.warn("123123123")
        createOWL{{$id}}();

        let sizeButton = document.querySelector('#{{$id}} .prevBtn');
        let width = sizeButton.offsetWidth;
        let wrapper = document.querySelector('#{{$id}} .wrapper');
        let w = (width)*2;
        if(wrapper != null) {
          wrapper.style.cssText = 'grid-template-columns: '+width+'px calc(100% - '+w+'px) '+width+'px';
        }


  })


});
</script>
  <style>
    #{{$id}} .wrapper {
      display: grid;
      align-items: center;
      grid-gap: 10px;
    }

    #{{$id}} .dots-linear .owl-dots .owl-dot span {
      width: 30px !important;
      height: 5px !important;
      margin: 0 5px !important;
      border-radius: 0;
    }
    #{{$id}} .dots-linear .owl-dots .owl-dot.active span,
    #{{$id}} .dots-linear .owl-dots .owl-dot:hover span {
      background: var(--primary) !important;
    }
    #{{$id}} .dots-linear .owl-dots .owl-dot:focus {
      outline: 0 !important;
    }


  </style>



@endif
<section id="{{$id}}">
  <div class="container">
    <div class="row">
      <div class="col-12">
        
        <div class="title-section">
          <h2 class="title">{!! $title !!}</h2>
          <h6 class="subtitle">
            {!! $subTitle !!}
          </h6>
        </div>
        
        <div id="{{$id}}Carousel" class="owl-carousel owl-theme">
          @php($x = 0) {{-- iterador de items --}}
          @php($j = 0) {{-- iterador de itemsBySlide --}}
          @while(isset($items[$x]))
            @php($j = 0)
            @if($itemsBySlide > 1)
              
              <div class="items-by-slide">
              @endif
                
                @while(isset($items[$x + $j]) && $j<$itemsBySlide)
                  @switch($repository)
                    @case('Modules\Icommerce\Repositories\ProductRepository')
                    <x-icommerce::product-list-item :product="$items[$x + $j]" :layout="$itemLayout"
                                                   :parentAttributes="$attributes"/>
                    @break
                    @default
                    <x-isite::item-list :item="$items[$x + $j]" :layout="$itemLayout" :parentAttributes="$attributes"/>
                    @break
                  @endswitch
                  @php($j++)
                @endwhile
              @if($itemsBySlide > 1)
              </div>
            @endif
            @php($x+=$itemsBySlide)
          @endwhile
        </div>
      </div>
    </div>
  </div>
</section>

@section('scripts-owl')
  <script>
    $(document).ready(function () {
      var owl = $('#{{$id}}Carousel');
      
      owl.owlCarousel({
        loop: {!! $loop ? 'true' : 'false' !!},
        lazyLoad: true,
        margin: {!! $margin !!},
        {!! !empty($navText) ? 'navText: '.$navText."," : "" !!}
        dots: {!! $dots ? 'true' : 'false' !!},
        responsiveClass: {!! $responsiveClass ? 'true' : 'false' !!},
        autoplay: {!! $autoplay ? 'true' : 'false' !!},
        autoplayHoverPause: {!! $autoplayHoverPause ? 'true' : 'false' !!},
        nav: {!! $nav ? 'true' : 'false' !!},
        responsive: {!! $responsive!!}
      });
      
    });
  </script>
  
  @parent

@stop

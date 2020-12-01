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
          @foreach($items as $item)
            @switch($repository)
              @case('Modules\Icommerce\Repositories\ProductRepository')
              <x-icommerce-product-list-item :product="$item" />
              @break
            @endswitch
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>



@section('scripts-owl')
  <script>
    $(document).ready(function(){
      var owl = $('#{{$id}}Carousel');
      
      owl.owlCarousel({
        loop: {!! $loop ? 'true' : 'false' !!},
        lazyLoad:true,
        margin: {!! $margin !!},
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

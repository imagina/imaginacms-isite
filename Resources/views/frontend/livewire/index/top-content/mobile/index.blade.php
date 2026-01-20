<div id="top-content-mobile" class="options-product-list options-product-list-mobile d-lg-none mb-4">

  <div class="frame-options">
    @include('isite::frontend.livewire.index.top-content.mobile.total-items')

    <div class="products-menu d-inline-flex">

          <button type="button" class="products-menu__item products-menu__item--layouts">

            @include('isite::frontend.livewire.index.top-content.mobile.change-layout')

          </button>

          <button type="button" class="products-menu__item products-menu__item--order">
             <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
             <i class="fa fa-long-arrow-down mr-1" aria-hidden="true"></i>
             <span>{{trans('isite::frontend.mobile.order')}}</span>
          </button>


          <button data-toggle="modal" data-target="#modalFilter" type="button" class="products-menu__item products-menu__item--filters">
              <i class="fa-regular fa-filter mr-1"></i>
              <span>{{trans('isite::frontend.mobile.filter')}}</span>
          </button>

    </div>
  </div>

	<div class="item-options item-options--order">

		<livewire:isite::filter-order-by key="filter-order-by-mobile"
		:config="config('asgard.'.$moduleName.'.config.orderBy')"
		type="radio"/>

	</div>

</div>

@section('scripts-owl')
   @parent

   <script type="text/javascript">
      $(document).ready(function () {

         var $orderByButton = $('.products-menu__item--order');
         var $orderByModal = $('.item-options--order');

         var $itemModalClose = $('.item-options__close');
         var body = document.body;

         $orderByButton.click(function() {
            $orderByModal.toggleClass('show');
            body.classList.toggle('overflow-hidden');
         });

         $itemModalClose.click(function () {
            $(this).parent().parent().toggleClass('show');
            body.classList.toggle('overflow-hidden');
         });


        // Check width
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if(width <= 992) {
			window.onscroll = function() {checkOffset()};
		}

    const topcontent = document.getElementById("top-content-mobile");
    const sticky = topcontent.offsetTop;
    let ultimoScroll = window.scrollY;

    window.addEventListener("scroll", () => {
      const scrollActual = window.scrollY;

      // 1. Sticky al pasar cierto punto
      if (scrollActual > sticky) {
        topcontent.classList.add("sticky-top-content");
      } else {
        topcontent.classList.remove("sticky-top-content");
      }

      // 2. Mostrar u ocultar según dirección del scroll
      if (scrollActual > ultimoScroll) {
        // Bajando
        topcontent.classList.remove("visible-top-content");
      } else {
        // Subiendo
        topcontent.classList.add("visible-top-content");
      }

      // Actualizar posición para la siguiente comparación
      ultimoScroll = scrollActual;

    });

      });
   </script>

@stop
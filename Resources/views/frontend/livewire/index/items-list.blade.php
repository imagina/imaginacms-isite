<div class="{{$entityName}}-list">
	
	@include('isite::frontend.livewire.index.top-content.index')
	
	<div class="{{$entityName}}s">
		
		@include('isite::frontend.partials.preloader')
		
		@if(isset($items) && count($items)>0)
			
			<div class="{{$wrapperClass}}">
				@foreach($items as $item)
					<div class="{{$layoutClass}} {{$entityName}}">
						
						
						<?php
						$hash = sha1($itemComponentNamespace);
						if (isset($component)) {
							$__componentOriginal{$hash} = $component;
						}
						$component = $__env->getContainer()->make($itemComponentNamespace, array_merge($itemComponentAttributes, ["item" => $item]));
						$component->withName($itemComponentName);
						if ($component->shouldRender()):
							$__env->startComponent($component->resolveView(), $component->data());
							if (isset($__componentOriginal{$hash})):
								$component = $__componentOriginal{$hash};
								unset($__componentOriginal{$hash});
							endif;
							echo $__env->renderComponent();
						endif;
						?>
					
					</div>
				@endforeach
			</div>
			
			@if($pagination["show"])
				@include('isite::frontend.livewire.index.pagination.index')
			@endif
		
		@else
			<div class="row">
				<div class="alert alert-danger my-5" role="alert">
					{{trans('isite::common.messages.no items')}}
				</div>
			</div>
		@endif
	
	
	</div>

</div>

@section('scripts')
	@parent
	<script type="text/javascript">
		
		document.addEventListener('DOMContentLoaded', function () {
			window.livewire.emit('itemListRendered',{!! json_encode($params) !!});
		});
		
		/*
  * Function Back Top
  */
		function itemsListBackToTop() {
			let positionY = window.pageYOffset;
			let scrollPos = $(".{{$entityName}}-list").offset().top;
			if (positionY > scrollPos)
				$("html, body").animate({scrollTop: scrollPos}, "slow");
		}
		
		/*
  * Event on Click Pagination
  */
		$(document).on('click', '.page-link-scroll', function (e) {
			itemsListBackToTop();
			return false;
		});
		
		/*
    * Listener Item List Rendered
    */
		Livewire.on('itemListRendered', function () {
			itemsListBackToTop();
		})
	
	</script>

@stop
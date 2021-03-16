<div class="items-list {{$entityName}}-list">
	
	@include('isite::frontend.livewire.index.top-content.index')
	
	<div class="items {{$entityName}}s">
		
		@include('isite::frontend.partials.preloader')
		
		@if(isset($items) && count($items)>0)
			
			<div class="items-list-wrapper {{$wrapperClass}}">
				
				@include("isite::frontend.livewire.index.partials.items")
				
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
    	* Document Ready Gral
    	*/
		jQuery(document).ready(function($) {

			/*
    		* Listener Item List Rendered
    		*/
			Livewire.on('itemListRendered', function () {
				
				if(@this.itemListLayout!="masonry"){
					itemsListBackToTop();
				}

				if(@this.itemListLayout=="masonry"){
					window.bricklayer = new window.Bricklayer(document.querySelector('.bricklayer'))
				}
				
			})

		});

	</script>

@stop
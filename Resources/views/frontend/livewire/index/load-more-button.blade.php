<div class="load-more-button mx-auto">

	@if($showBtnLoadMore && $pagination["type"]=="loadMore")
  		<a wire:click="loadMore" class="btn btn-primary btn-load-more">{{trans('isite::frontend.buttons.load more')}}</a>
  	@endif

</div>

@section('scripts-owl')
	@parent
	<script type="text/javascript">
		
	    jQuery(document).ready(function($) {
	    	
	    	function htmlToElements(html) {
			    var template = document.createElement('template');
			    template.innerHTML = html;
			    return template.content.childNodes;
			}

		    window.addEventListener('items-load-more-button', event => {
		    	
		    	// Bricklayer needed
		    	@if($itemListLayout=="masonry")
			    	var rows = htmlToElements(event.detail.newHtml);
			    	for(var value of rows.values()) {
					  window.bricklayer.append(value)
					}
				@else
					$(".items-list .items .items-list-wrapper").append(event.detail.newHtml);
				@endif

				
				if(@this.pagination['type']=="infiniteScroll")
					@this.infiniteStatus = false;
				
		    });

		    /*
		    * Event to Infinite Scroll Pagination Type
		    */
		    if(@this.pagination['type']=="infiniteScroll"){

		    	let itemListPos = $(".{{$itemMainClass}}-list").offset().top;

			   	window.onscroll = function(ev) {

			   		/*
					* showBtnLoadMore == true = exist more elements
					* infiniteStatus == false = Request is not executting
			   		*/
			   		if(@this.showBtnLoadMore && !@this.infiniteStatus){
			   			
			   			/*
			   			* innerHeight = Altura en pix del viewport
			   			* scrollY = Número de píxeles, desplazados mediante el scroll vertical.
			   			*/
			   			var currentPos = window.innerHeight + window.scrollY + itemListPos;

			   			// body.offsetHeight = alto de un elemento
				        if (currentPos >= document.body.offsetHeight) {
				            window.livewire.emit('loadMoreButtonInfinite');
				        }
				    }
			    };
			}
		   
		});

	</script>

@stop				
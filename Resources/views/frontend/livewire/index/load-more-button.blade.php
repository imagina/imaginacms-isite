<div class="load-more-button mx-auto">

	@if($showBtnLoadMore)
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

		    });
		   
		});

	</script>

@stop				
<div class="item-modal">

	<div wire:ignore.self id="itemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl" role="document">

	    <div class="modal-content">
	    	
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>

		    <div class="modal-body"></div>

	    </div>
	    
	  </div>
	</div>

</div>

@section('scripts-owl')
	@parent
	 <script type="text/javascript">

	    window.addEventListener('item-load-modal-content', event => {
	          
	        $('#itemModal').modal('show'); 
	        $("#itemModal .modal-body").append(event.detail.newHtml);
	       
	    });

	</script>
@stop
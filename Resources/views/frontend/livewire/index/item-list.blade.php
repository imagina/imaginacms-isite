<div class="{{$entityName}}-list">

	@include('isite::frontend.livewire.index.top-content.index')
	
	<div class="{{$entityName}}s">
		
		@include('isite::frontend.partials.preloader')
		
		@if(isset($items) && count($items)>0)

			<div class="{{$wrapperClass}}">
				@foreach($items as $item)
				<div class="{{$layoutClass}} {{$entityName}}">
					
					<x-dynamic-component 
	                  :component="$itemComponentName"
	                  :item="$item"
	                  :itemListLayout="$itemListLayout"
	                />
	                
				</div>
				@endforeach
			</div>

			@if($pagination["show"])
				<div class="row">
					<div class="{{$entityName}}-list-pagination d-flex w-100 px-3 justify-content-end">

						@if($pagination["type"]=="normal")
							{{ $items->links('isite::frontend.livewire.index.custom-pagination') }}
						@endif
						@if($pagination["type"]=="loadMore")
							<a wire:click="loadMore" class="btn btn-primary btn-load-more">{{trans('isite::frontend.buttons.load more')}}</a>
						@endif
						
					</div>
				</div>
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
    
    $(document).on('click', '.page-link-scroll', function (e) {
    	let scrollPos = $(".{{$entityName}}-list").offset().top; 

	  $("html, body").animate({ scrollTop: scrollPos }, "slow");
	  return false;
	});
</script>

@stop
<div class="row">
	<div class="{{$entityName}}-list-pagination d-flex w-100 px-3 justify-content-end">

		@if($pagination["type"]=="normal")
			{{ $items->links('isite::frontend.livewire.index.pagination.custom') }}
		@endif
		
		@if($pagination["type"]=="loadMore")
			<a wire:click="loadMore" class="btn btn-primary btn-load-more">{{trans('isite::frontend.buttons.load more')}}</a>
		@endif
						
	</div>
</div>
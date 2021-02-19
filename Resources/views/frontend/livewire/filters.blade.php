<div class="filters">
	@if(!empty($filters))
		@foreach($filters as $index => $filter)
			@if($filter['status'])
				<div class="row">
					<div class="{{$filter['classes']}}">
						@livewire("isite::filter-".$filter['type'], $filter, key($index.'-'.$filter['type']))
					</div>
				</div>
			@endif
		@endforeach
	@endif
</div>
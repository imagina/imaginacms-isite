<div class="filters">
	@if(!empty($filters))
		@foreach($filters as $index => $filter)

			@livewire("isite::filter-".$filter['type'], ['filter' => $filter,'index' => $index], key($index.'-'.$filter['type']))
			
		@endforeach
	@endif

</div>
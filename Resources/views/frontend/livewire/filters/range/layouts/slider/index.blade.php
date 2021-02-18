<div class="filter-{{$filter['type']}} filter-{{$filter['type']}}-layout-{{$filter['layout']}} filter-{{$index}}">
	
	<div class="title">
        <a class="item mb-3" data-toggle="collapse" href="#collapse-{{$index}}" role="button" aria-expanded="{{$isExpanded ? 'true' : 'false'}}" aria-controls="collapse-{{$index}}" class="{{$isExpanded ? '' : 'collapsed'}}">

			@php($titleFilter = config("asgard.icommerce.config.filters.{$index}.title"))
            <h5 class="p-3 border-top border-bottom">
	  			<i class="fa angle float-right" aria-hidden="true"></i>
	  			{{trans($titleFilter)}}
	  		</h5>
	  		
		</a>
	</div>

	<div class="content position-relative my-3">

		@include('isite::frontend.partials.preloader')

		<div class="collapse multi-collapse {{$isExpanded ? 'show' : ''}} mb-2" id="collapse-{{$index}}">
			dashdjashdj
		</div>

	</div>

	
</div>
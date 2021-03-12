<div class="filter-{{$type}} filter-{{$type}}-layout-{{$layout}} filter-{{$name}}">
@if($show)
	<div class="title">
        <a class="item mb-3" data-toggle="collapse" href="#collapse-{{$name}}" role="button" aria-expanded="{{$isExpanded ? 'true' : 'false'}}" aria-controls="collapse-{{$name}}" class="{{$isExpanded ? '' : 'collapsed'}}">

            <h5 class="p-3 border-top border-bottom">
	  			<i class="fa angle float-right" aria-hidden="true"></i>
	  			{{$title}}
	  		</h5>
	  		
		</a>
	</div>

	<div class="content position-relative my-3">

		@include('isite::frontend.partials.preloader')

		<div class="collapse multi-collapse {{$isExpanded ? 'show' : ''}} mb-2" id="collapse-{{$name}}">

			<div class="form-row">
				<div class="col-md-6">
					<input type="number" id="selPriceMin-{{$name}}" name="selPriceMin-{{$name}}" class="form-control form-control-sm" value="{{$selPriceMin}}">
				</div>
				<div class="col-md-6">
					<input type="number" id="selPriceMax-{{$name}}" name="selPriceMax-{{$name}}"  class="form-control form-control-sm" value="{{$selPriceMax}}">
				</div>
			</div>

			<div class="mx-3">
				<button onClick="window.livewire.emit('updateRange',{'selPriceMin' : document.getElementById('selPriceMin-{{$name}}').value,'selPriceMax' : document.getElementById('selPriceMax-{{$name}}').value})" id="btnUpdatePrices" class="btn btn-outline-primary btn-sm btn-block mt-3">
					{{trans('icommerce::common.button.update')}}
				</button>
			</div>
			

		</div>

	</div>

@endif
</div>


@section('scripts')
@parent

	<script>
	jQuery(document).ready(function($) {
		
		
	});
	</script>

@stop
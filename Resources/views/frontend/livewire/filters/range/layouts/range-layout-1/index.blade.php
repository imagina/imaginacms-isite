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
			
			<input type="text" id="amount-{{$name}}" class="amount border-0 text-primary font-weight-bold mb-2" readonly>

			<input type="hidden" id="priceMin" name="priceMin" wire:model="priceMin">
			<input type="hidden" id="priceMax" name="priceMax" wire:model="priceMax">

			<input type="hidden" id="selPriceMin-{{$name}}" name="selPriceMin" wire:model="selPriceMin">
			<input type="hidden" id="selPriceMax-{{$name}}" name="selPriceMax" wire:model="selPriceMax">
			
			<div class="mx-3">
			<div id="slider-range-{{$name}}" wire:ignore></div>

			<button onClick="window.livewire.emit('updateRange',{'selPriceMin' : document.getElementById('selPriceMin-{{$name}}').value,'selPriceMax' : document.getElementById('selPriceMax-{{$name}}').value})" id="btnUpdatePrices" class="btn btn-outline-primary btn-sm btn-block mt-3">
				{{trans('icommerce::common.button.update')}}
			</button>
			</div>

		</div>

	</div>

@endif
</div>


@push('css-stack')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush


@section('scripts')
@parent

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>
	jQuery(document).ready(function($) {
		/*
		* Create Slider Range Price
		*/
		function createSlider(newPriceMin,newPriceMax,selNewPriceMin,selNewPriceMax,step){

			// Testing
			//console.warn(newPriceMin,newPriceMax,selNewPriceMin,selNewPriceMax,step)

			$( "#slider-range-{{$name}}" ).slider({
		      	range: true,
		      	min: newPriceMin,
		      	max: newPriceMax,
		      	step: step,
		      	values: [selNewPriceMin, selNewPriceMax],
		      	slide: function( event, ui ) {
		        	$( "#amount-{{$name}}" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );

		        	$( "#selPriceMin-{{$name}}" ).val(ui.values[ 0 ]);
		        	$( "#selPriceMax-{{$name}}" ).val(ui.values[ 1 ]);
		      	}
		    });

		    $( "#amount-{{$name}}" ).val( "$" + $( "#slider-range-{{$name}}" ).slider( "values", 0 ) +
	      " - $" + $( "#slider-range-{{$name}}" ).slider( "values", 1 ) );
			
		}

		/*
		* First Time
		*/
		var defPriceMin = {{$priceMin}};
		var defPriceMax = {{$priceMax}};

		createSlider(defPriceMin,defPriceMax,0,1,1000)
		

	    /*
		* Listener Filter Prices Update
		*/
		window.addEventListener('filter-prices-updated', event => {

			if($("#slider-range-{{$name}}").hasClass( "ui-slider" ))
			$("#slider-range-{{$name}}").slider("destroy");
    		createSlider(event.detail.newPriceMin,event.detail.newPriceMax,event.detail.newSelPriceMin,event.detail.newSelPriceMax,event.detail.step)

		})

	});
	</script>

@stop
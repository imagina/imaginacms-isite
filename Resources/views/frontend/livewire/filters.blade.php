<div class="filters">
	@if(!empty($filters))

		<div id="staticdiv">
			<div id="contenttomove">
				@foreach($filters as $index => $filter)
					@if($filter['status'])
						<div class="row">
							<div class="{{$filter['classes']}}">
								@livewire("isite::filter-".$filter['type'], $filter, key($index.'-'.$filter['type']))
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>

		<div class="modal  fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title">{{trans('isite::frontend.filters.title')}}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body" id="modal-body"></div>

				</div>
			</div>

		</div>

	@endif
</div>

@section('scripts')
	@parent
	<script>

		$(document).ready(function () {

			function divtomodal() {
				var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
				if(width <= 992) {
					$('#modal-body').append($("#contenttomove"));
				} else {
					$('#staticdiv').append($("#contenttomove"));
				}
			}

			@if($showResponsiveModal)
				$(window).resize(divtomodal);
				var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
				if(width<=992)
					divtomodal()
			@endif
		});
	</script>

@stop
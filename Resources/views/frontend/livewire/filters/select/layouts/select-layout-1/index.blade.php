<div class="filter-{{$type}} filter-{{$type}}-layout-{{$layout}} filter-{{$name}}">
  @if($status)
	<div class="title">
      <a class="item mb-3" @if($isCollapsable) data-toggle="collapse" href="#collapse-{{$name}}" role="button"
         aria-expanded="{{$isExpanded ? 'true' : 'false'}}" aria-controls="collapse-{{$name}}"
         class="{{$isExpanded ? '' : 'collapsed'}}" @endif>
            <h5 class="p-3 border-top border-bottom">
	  			<i class="fa angle float-right" aria-hidden="true"></i>
	  			{{$title}}
	  		</h5>
	  		
		</a>
	</div>

	<div class="content position-relative m-3">

		@include('isite::frontend.partials.preloader')
      <div @if($isCollapsable) class="collapse multi-collapse {{$isExpanded ? 'show' : ''}}"
           id="collapse-{{$name}}" @endif>
				<label>{{$title}}</label>
        <select class="form-control" name="select" wire:model="selected">
					<option value="null">Seleccione un(a) {{$title}}</option>
          @foreach($options as $item)
            <option value="{{$item->id}}">{{$item->title ?? $item->name}}</option>
          @endforeach
        </select>
		</div>

	</div>
@endif
</div>
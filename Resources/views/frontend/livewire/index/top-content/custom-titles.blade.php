<h1 class="text-primary text-uppercase font-weight-bold h3">{{$title}}</h1>

@if(isset($category->options->descriptionIndex) && !empty($category->options->descriptionIndex))
	<p class="category-index-description">
		{{$category->options->descriptionIndex}}
	</p>
@else
	@php($customIndexDescription = setting($moduleName.'::customIndexDescription'))
	@if(!empty($customIndexDescription))
		<p class="custom-index-description">
			{{$customIndexDescription}}
		</p>
	@endif
@endif

<hr>
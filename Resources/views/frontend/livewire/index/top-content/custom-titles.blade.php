@php($customIndexTitle = setting($moduleName.'::customIndexTitle'))
<h1 class="text-primary text-uppercase font-weight-bold h3">{{$category->title ?? (!empty($customIndexTitle) ? setting($moduleName.'::customIndexTitle') : trans($moduleName.'::frontend.index.title') )}} {{isset($manufacturer->id) ? isset($category->id) ? "/ $manufacturer->name" : $manufacturer->name : ""}}</h1>

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
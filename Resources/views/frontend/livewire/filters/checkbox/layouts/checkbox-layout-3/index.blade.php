<div class="filter-{{$type}} filter-{{$type}}-layout-{{$layout}} filter-{{$name}}">
  <div class="content position-relative {{$wrapperClasses}}">
    @include('isite::frontend.partials.preloader')
    @foreach($this->options->where("parent_id", $parentId) as $key => $option)
      @include('isite::frontend.livewire.filters.checkbox.layouts.checkbox-layout-3.option',['option'=> $option])
      @php
        $position = $position + 1;
      @endphp
    @endforeach
  </div>
</div>
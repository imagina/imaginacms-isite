<div class="filter-{{$type}} filter-{{$type}}-layout-{{$layout}} filter-{{$name}}">
  @if($status)
    <div class="content position-relative m-3">
      <input type="text" class="form-control" id="{{$name}}" aria-describedby="{{$name}}"
             placeholder="{{$placeholder}}" wire:model="{{$name}}">
    </div>
  @endif
</div>
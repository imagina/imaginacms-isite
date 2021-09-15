@if($canAccess)
  <div {{$idButton ? 'id=".$idButton."' : ''}} class="position-absolute  {{$classes}}"
       style="top:{{$top}}; bottom:{{$bottom}}; left: {{$left}}; right: {{$right}}; z-index:999">
    <a class="btn btn-sm text-white" style="background: dodgerblue" href="{{url($link)}}" target="_blank" data-toggle="tooltip" title="{{$tooltip}}"
       style="z-index:999">
      <i class="fa fa-pencil text-white"></i> | {{trans("isite::common.editLink.buttonEdit")}}
    </a>
  </div>
@endif
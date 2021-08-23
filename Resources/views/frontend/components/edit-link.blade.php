@if($canAccess)
  <div {{$idButton ? 'id=".$idButton."' : ''}} class="position-absolute  {{$classes}}"
       style="top:{{$top}}; bottom:{{$bottom}}; left: {{$left}}; right: {{$right}}; z-index:999">
    <a href="{{url($link)}}" class="" target="_blank" data-toggle="tooltip" title="{{$tooltip}}">
 <span class="fa-stack fa-lg ">
   <i class="fa fa-circle fa-stack-2x text-dark"></i>
 <i class="fa fa-pencil-square-o fa-stack-1x text-white" aria-hidden="true"></i>
 </span>
    </a>
  </div>
@endif
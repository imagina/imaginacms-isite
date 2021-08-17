@if($canAccess)
  <div id="editbutton" class="editbutton"
       style="top:{{$top}}; bottom:{{$bottom}}; left: {{$left}}; right: {{$right}}">
    <a href="{{url($link)}}" class="position-absolute {{$classes}}" target="_blank" data-toggle="tooltip" title="{{$tooltip}}">
 <span class="fa-stack fa-lg ">
   <i class="fa fa-circle fa-stack-2x text-dark"></i>
 <i class="fa fa-pencil-square-o fa-stack-1x text-white" aria-hidden="true"></i>
 </span>
    </a>
  </div>
@endif
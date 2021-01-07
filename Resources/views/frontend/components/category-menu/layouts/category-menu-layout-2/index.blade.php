<div id="{{ $id }}">
  <div class="col-auto d-block d-lg-none px-1 px-sm-3">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link link-movil cursor-pointer" data-toggle="modal" data-target="#{{ $id }}menuModal">
          <i class="fa fa-bars"></i>
        </a>
      </li>
    </ul>
  </div>
  
  <div id="{{ $id }}contentToMove">
    <nav id="{{$id}}nav" class="navbar navbar-category-2 p-0">
      @if($menuBefore)
        @menu($menuBefore,'imagina-navbar')
      @endif
    
      <ul id="{{ $id }}navbarUl" class="navbar-nav">
        @if($withHome)
          <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link">
              <i class="{{$homeIcon}}" aria-hidden=Q"true"></i>
              {{ trans('isite::common.menu.home') }}
            </a>
          </li>
        @endif
        @foreach($items as $item)
          @php($firstChildrenLevel = count($item->children) ? $item->children  : null)
          <li class="nav-item {{$firstChildrenLevel ? 'dropdown' : ''}}">
            <a href="{{$item->url}}" class="nav-link {{$firstChildrenLevel ? ' dropdown-toggle' : ''}}" data-toggle="{{$firstChildrenLevel ? 'dropdown' : ''}}">
              @php($mediaFiles = $item->mediaFiles())
            
              @if(isset($mediaFiles->iconimage->path) && !strpos($mediaFiles->iconimage->path,"default.jpg"))
                <img class="filter" src="{{$mediaFiles->iconimage->path}}">
              @endif
              {{ $item->title ?? $item->name }}
            </a>
            @if($firstChildrenLevel)
            
              <ul class="dropdown-menu">
                @foreach($firstChildrenLevel as $firstChildLevel)
                  @php($secondChildrenLevel = $firstChildLevel->children ?? null)
                  <li class="nav-item {{$secondChildrenLevel ? 'dropdown' : ''}}">
                    <a class="nav-link" data-toggle="{{$secondChildrenLevel ? 'dropdown' : ''}}" href="{{$firstChildLevel->url}}">{{ $firstChildLevel->title ?? $firstChildLevel->name }}</a>
                    @if($secondChildrenLevel)
                    
                      <ul class="dropdown-menu">
                        @foreach($secondChildrenLevel as $secondChildLevel)
                          <li class="nav-item">
                            <a class="nav-link" href="{{$secondChildLevel->url}}">{{ $secondChildLevel->title ?? $secondChildLevel->name }}</a>
                          </li>
                        @endforeach
                      </ul>
                  
                    @endif
                  </li>
                @endforeach
              </ul>
          
            @endif
          </li>
        @endforeach
      </ul>
    
      @if($menuAfter)
        @menu($menuAfter,'imagina-navbar')
      @endif
    </nav>

  </div>
  
  <div class="modal modal-menu fade" id="{{ $id }}menuModal" tabindex="-1" role="dialog"
       aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header rounded-0">
            <x-isite::logo name="logo1" imgClasses="mx-auto my-2"/>
          <button  type="button" class="close my-0" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times-circle text-white"></i>
          </button>
        </div>
        <div class="modal-body">
          
          <nav class="navbar navbar-movil p-0">
            
            <div class="collapse navbar-collapse show " id="{{ $id }}modalBody">
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@section('scripts-owl')
  @parent
  <script>
    
    $(document).ready(function () {
      
      function divtomodal() {
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if (width <= 992) {
        
          $('#{{ $id }}modalBody').append($("#{{ $id }}nav"));
        } else {
  
          $('#{{ $id }}contentToMove').append($("#{{ $id }}nav"));
        }
      }
      
      $(window).resize(divtomodal);
      
      var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
      if(width<=992)
        divtomodal()
    });
  </script>

@stop

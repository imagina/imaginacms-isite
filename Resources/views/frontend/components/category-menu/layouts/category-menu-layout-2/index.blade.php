<div id="{{ $id }}">
    <nav class="navbar header-nav navbar-expand-xl navbar-light p-0">
        <button class="navbar-toggler d-block d-xl-none my-2 " type="button" data-toggle="modal" data-target="#{{ $id }}menuModal" aria-label="Toggle navigation">
            {!! $title !!}
        </button>
        <div id="{{ $id }}navbarCollapse" class="collapse navbar-collapse">
            <ul id="{{ $id }}navbarUl" class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars mr-2"></i> {!! $title !!}
                    </a>
                </li>
                @foreach($items as $item)
                    @php($firstChildrenLevel = count($item->children) ? $item->children  : null)
                    <li class="nav-item {{$firstChildrenLevel ? 'dropdown' : ''}}">
                        <a href="{{$item->url}}" class="nav-link" data-toggle="{{$firstChildrenLevel ? 'dropdown' : ''}}">
                            @php($mediaFiles = $item->mediaFiles())

                            @if(isset($mediaFiles->tertiaryimage->path) && !strpos($mediaFiles->tertiaryimage->path,"default.jpg"))
                                <img class="filter" src="{{$mediaFiles->tertiaryimage->path}}">
                            @endif
                            {{ $item->title ?? $item->name }}
                        </a>
                        @if($firstChildrenLevel)
                            <div class="dropdown-menu">
                                <h3><a href="{{$item->url}}">{{ $item->title ?? $item->name }}</a></h3>
                                @if($firstChildrenLevel)
                                    <ul class="frame-dropdown">
                                        @foreach($firstChildrenLevel as $firstChildLevel)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{$firstChildLevel->url}}">{{ $firstChildLevel->title ?? $firstChildLevel->name }}</a>
                                                @php($secondChildrenLevel = $firstChildLevel->children ?? null)
                                                @if($secondChildrenLevel)
                                                    <div class="dropdown-submenu">
                                                        @foreach($secondChildrenLevel as $secondChildLevel)
                                                            <a href="{{$secondChildLevel->url}}">{{ $secondChildLevel->title ?? $secondChildLevel->name }}</a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
<div class="modal modal-menu fade" id="{{ $id }}menuModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header rounded-0">
                <img src="@setting('isite::logo1')" class="img-fluid mx-auto py-2"/>
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
@section('scripts-owl')
    @parent
    <script>

      $(document).ready(function () {

        function divtomodal() {

          var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
          if (width <= 992) {
            console.log('xs');
            $('#{{ $id }}modalBody').append($("#{{ $id }}ulNavItem"));
          } else {
            console.log('not-xs');
            $('#{{ $id }}liNavItem').append($("#{{ $id }}ulNavItem"));
          }

        }

        $(window).resize(divtomodal);

        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if(width<=992)
          divtomodal()
      });
    </script>

@stop

<div id="{{ $id }}">
    <button class="navbar-toggler d-block d-lg-none my-2" type="button" data-toggle="modal" data-target="#{{ $id }}menuModal" aria-label="Toggle navigation">
        {!! $title !!}
    </button>
    <div class="col-auto d-none d-lg-block">
        <a class="modal-link" data-toggle="modal" data-target="#{{ $id }}menuModalPrincipal" aria-label="Toggle navigation">
            <i class="fa fa-bars mr-2"></i> {!! $title !!}
        </a>
    </div>
    <div class="modal modal-menu fade" id="{{ $id }}menuModalPrincipal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header rounded-0">
                    <x-isite::logo name="logo1" central="central" imgClasses="mx-auto my-2 modal-logo"/>
                    <a  type="button" class="close my-0" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times-circle"></i>
                    </a>
                </div>
                <div class="modal-title" onmouseover="closeLinks()">
                    {!! $title !!}
                </div>
                <div class="modal-body modal-scroll">
                    <ul class="nav flex-column">
                        @foreach($items as $item)
                        @php($firstChildrenLevel = count($item->children) ? $item->children  : null)
                        <li class="nav-item">
                            <a  @if(empty($firstChildrenLevel)) class="nav-link" href="{{$item->url}}" onmouseover="closeLinks()"
                                @else class="nav-link nav-link-hover" onmouseover="openLinks(event, '{{ $item->title ?? $item->name }}Menu')" @endif >
                                @php($mediaFiles = $item->mediaFiles())
                                @if(isset($mediaFiles->iconimage->path) && !strpos($mediaFiles->iconimage->path,"default.jpg"))
                                    <img class="filter" src="{{$mediaFiles->iconimage->path}}">
                                @endif
                                {{ $item->title ?? $item->name }}
                                @if(!empty($firstChildrenLevel)) <i class="arrow"></i> @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal-dialog-submenu">
        @foreach($items as $item)
            @php($firstChildrenLevel = count($item->children) ? $item->children  : null)
            @if($firstChildrenLevel)
                <div id="{{ $item->title ?? $item->name }}Menu" class="modal-content-panel modal-scroll">
                    <h3><a href="{{$item->url}}">{{ $item->title ?? $item->name }}</a></h3>
                    @if($firstChildrenLevel)
                        <div class="row modal-content-chilfren">
                            @foreach($firstChildrenLevel as $firstChildLevel)
                                @if($firstChildLevel->status)
                                    <li class="col-6 nav-item">
                                        <a class="nav-link" href="{{$firstChildLevel->url}}">{{ $firstChildLevel->title ?? $firstChildLevel->name }}</a>
                                        @php($secondChildrenLevel = $firstChildLevel->children ?? null)
                                        @if($secondChildrenLevel)
                                            <div class="dropdown-submenu">
                                                @foreach($secondChildrenLevel as $secondChildLevel)
                                                    @if($secondChildLevel->status)
                                                        <a href="{{$secondChildLevel->url}}">{{ $secondChildLevel->title ?? $secondChildLevel->name }}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
        </div>
    </div>
    <div class="modal modal-menu fade" id="{{ $id }}menuModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header rounded-0">
                    <x-isite::logo name="logo1" central="central" imgClasses="mx-auto my-2 modal-logo"/>
                    <a  type="button" class="close my-0" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times-circle"></i>
                    </a>
                </div>
                <div class="modal-title">
                    {!! $title !!}
                </div>
                <div class="modal-body modal-scroll">
                    <nav class="nav-movil">
                        <ul id="{{ $id }}ulNavItem" class="navbar-nav">
                            @foreach($items as $item)
                                @php($firstChildrenLevel = count($item->children) ? $item->children  : null)
                                <li class="nav-item {{$firstChildrenLevel ? 'dropdown' : ''}}">
                                    <a href="{{$item->url}}" class="nav-link" data-toggle="{{$firstChildrenLevel ? 'dropdown' : ''}}">
                                        @php($mediaFiles = $item->mediaFiles())
                                        @if(isset($mediaFiles->iconimage->path) && !strpos($mediaFiles->iconimage->path,"default.jpg"))
                                            <img class="filter" src="{{$mediaFiles->iconimage->path}}">
                                        @endif
                                        {{ $item->title ?? $item->name }}
                                        @if(!empty($firstChildrenLevel)) <i class="arrow"></i> @endif
                                    </a>
                                    @if($firstChildrenLevel)
                                        <div class="dropdown-menu">
                                            @if($firstChildrenLevel)
                                                <ul class="frame-dropdown {{ count($firstChildrenLevel) > 1 ? "frame-dropdown2": ""}}">
                                                    @foreach($firstChildrenLevel as $firstChildLevel)
                                                        @if($firstChildLevel->status)
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{$firstChildLevel->url}}">{{ $firstChildLevel->title ?? $firstChildLevel->name }}</a>
                                                                @php($secondChildrenLevel = $firstChildLevel->children ?? null)
                                                                @if($secondChildrenLevel)
                                                                    <div class="dropdown-submenu">
                                                                        @foreach($secondChildrenLevel as $secondChildLevel)
                                                                            @if($secondChildLevel->status)
                                                                                <a href="{{$secondChildLevel->url}}">{{ $secondChildLevel->title ?? $secondChildLevel->name }}</a>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@include('isite::frontend.components.category-menu.partials.style-layout-4')
@section('scripts-owl')
    @parent
    <script>
        function closeLinks() {
            let i, modalcontent;
            modalcontent = document.getElementsByClassName("modal-content-panel");
            for (i = 0; i < modalcontent.length; i++) {
                modalcontent[i].style.display = "none";
            }
        }
        function openLinks(evt, itemMenu) {
            let navlinks;
            closeLinks();
            navlinks = document.getElementsByClassName("nav-link-hover");
            for (i = 0; i < navlinks.length; i++) {
                navlinks[i].className = navlinks[i].className.replace(" active", "");
            }
            document.getElementById(itemMenu).style.display = "block";
            evt.currentTarget.className += " active";
        }
        $(document).ready(function () {
            function divtomodal() {
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                if (width <= 992) {
                    $('#{{ $id }}menuModalPrincipal').modal('hide');
                } else {
                    $('#{{ $id }}menuModal').modal('hide');
                }
            }
            $(window).resize(divtomodal);
            var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            if (width <= 992) {
                divtomodal()
            }
        });
    </script>
@stop
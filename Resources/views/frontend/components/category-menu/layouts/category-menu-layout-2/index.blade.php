<div id="{{ $id }}">
    <nav class="navbar navbar-expand-lg navbar-light p-0">
        <div class="collapse navbar-collapse" id="{{ $id }}navbarNav">
            <ul id="{{ $id }}navbarUl" class="navbar-nav">
                @foreach($items as $item)
                    @php($firstChildrenLevel = count($item->children) ? $item->children  : null)
                    <li class="nav-item {{$firstChildrenLevel ? 'dropdown' : ''}}">
                        <a href="{{$item->url}}" class="nav-link" data-toggle="{{$firstChildrenLevel ? 'dropdown' : ''}}">
                            @php($mediaFiles = $item->mediaFiles())

                            @if(isset($mediaFiles->iconimage->path) && !strpos($mediaFiles->iconimage->path,"default.jpg"))
                                <img class="filter" src="{{$mediaFiles->iconimage->path}}">
                            @endif
                            {{ $item->title ?? $item->name }}
                        </a>
                        @if($firstChildrenLevel)
                            <div class="dropdown-menu">
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
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>

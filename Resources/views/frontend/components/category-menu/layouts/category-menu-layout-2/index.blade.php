<div id="{{ $id }}">
    @if($menuBefore)
        @menu($menuBefore)
    @endif
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
                                        @php($secondChildrenLevel = $firstChildLevel->children ?? null)
                                        <li class="nav-item {{$secondChildrenLevel ? 'dropdown' : ''}}">
                                            <a class="nav-link" data-toggle="{{$secondChildrenLevel ? 'dropdown' : ''}}" href="{{$firstChildLevel->url}}">{{ $firstChildLevel->title ?? $firstChildLevel->name }}</a>
                                            @if($secondChildrenLevel)
                                                <div class="dropdown-menu">
                                                    <ul class="frame-dropdown">
                                                        @foreach($secondChildrenLevel as $secondChildLevel)
                                                            <li class="nav-item">
                                                                <a href="{{$secondChildLevel->url}}">{{ $secondChildLevel->title ?? $secondChildLevel->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
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
    @if($menuAfter)
        @menu($menuAfter)
    @endif
</div>

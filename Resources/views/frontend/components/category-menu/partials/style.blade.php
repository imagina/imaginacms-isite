<style>
@if($layout=='category-menu-layout-1')
#categoryMegaMenu .navbar-nav > .nav-item .nav-link {
    background-color: #ffffff;
    color: var(--primary);
    font-size: 1.125rem;
    padding: 29px 15px;
    text-transform: uppercase;
}
#categoryMegaMenu .dropdown-menu {
    background-color: #f5f5f5;
    min-width: 15rem;
    padding: 15px 0;
    border-radius: 0;
    margin-top: 0;
}
#categoryMegaMenu .dropdown-menu > .nav-item .nav-link {
    color: #444444;
    text-transform: capitalize;
    padding: 0.5rem 1rem;
    background-color: #f5f5f5;
    font-size: 0.75rem;
}
#categoryMegaMenu .dropdown-menu > .nav-item .nav-link img {
    width: 20px;
    object-fit: contain;
    margin-right: 0.5rem;
}
#categoryMegaMenu .dropdown-menu > .nav-item .nav-link img.white {
    display: none;
}
#categoryMegaMenu .dropdown-menu > .nav-item .nav-link img.dark {
    display: inline-block;
}
#categoryMegaMenu .dropdown-menu > .nav-item .nav-link:hover {
    color: #fff;
    background-color: var(--primary);
}
#categoryMegaMenu .dropdown-menu > .nav-item .nav-link:hover img.white {
    display: inline-block;
}
#categoryMegaMenu .dropdown-menu > .nav-item .nav-link:hover img.dark {
    display: none;
}
#categoryMegaMenu .dropdown-menu .dropdown {
    position: initial;
}
#categoryMegaMenu .dropdown-menu .dropdown .nav-link {
    padding: 0.5rem 1rem;
}
#categoryMegaMenu .dropdown-menu .dropdown .nav-link:after {
    content: "\f105";
    font-family: FontAwesome;
    float: right;
    border: 0;
}
#categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu {
    background-color: #EBEBEB;
    position: absolute;
    left: calc(15rem - 3px);
    min-width: 30rem;
    top: -1px;
    visibility: hidden;
    opacity: 0;
    padding: 25px;
    min-height: 100%;
    border: 0;
}
#categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown, #categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown2 {
    list-style: none;
    position: relative !important;
    min-width: auto !important;
    left: 0 !important;
    border: 0 !important;
    padding: 0 !important;
    visibility: visible;
    opacity: 1;
}
#categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown .nav-link, #categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown2 .nav-link {
    color: #444444;
    text-transform: capitalize;
    padding: 0 0 2px 0;
    background-color: #ebebeb;
    font-size: 0.875rem;
    font-weight: bold;
    margin-bottom: 12px;
    position: relative;
}
#categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown .nav-link:hover, #categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown2 .nav-link:hover {
    background-color: #ebebeb;
    color: #444444;
}
#categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown .nav-link:before, #categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown2 .nav-link:before {
    content: "";
    bottom: 2px;
    position: absolute;
    background-color: #fff;
    width: 100%;
    height: 1px;
}
#categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown .nav-link:after, #categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown2 .nav-link:after {
    content: "";
}
#categoryMegaMenu .dropdown-menu .dropdown .dropdown-menu .frame-dropdown2 {
    column-count: 2;
}
#categoryMegaMenu .dropdown-menu .dropdown:hover .dropdown-menu {
    visibility: visible;
    opacity: 1;
    display: block;
}
#categoryMegaMenu h3 {
    font-size: 1.125rem;
    font-weight: bold;
    margin-bottom: 15px;
}
#categoryMegaMenu h3 a {
    color: var(--dark);
}
#categoryMegaMenu .dropdown-submenu {
    padding: 0 0.5rem 0.5rem 0.5rem;
}
#categoryMegaMenu .dropdown-submenu a {
    font-weight: 400;
    display: block;
    padding: 0 0.5rem;
    color: var(--dark);
    font-size: 0.875rem;
}
#categoryMegaMenu .dropdown-submenu a:hover {
    color: var(--primary);
}
@else

    @if($layout=='category-menu-layout-3')
    #{{$id}} .navbar-nav .nav-item .nav-link {
        color: {{ !empty($deskColor1) ? $deskColor1 : 'var(--primary)' }};
        font-size: {{$deskTextSize}}px;
        text-transform: {{$deskTextTransform}};
        @if(!empty($deskNav))
        {!!$deskNav!!}
        @endif
        &:hover {
            color: {{ !empty($deskColor2) ? $deskColor2 : 'var(--dark)' }};
            @if(!empty($deskNavHover))
                {!!$deskNavHover!!}
            @endif
        }
        @if(!empty($deskNavBefore))
        &:before {
            {!! $deskNavBefore !!}
        }
        @endif
        @if(!empty($deskNavHoverBefore))
        &:hover:before {
             {!! $deskNavHoverBefore !!}
        }
        @endif
    }
    #{{$id}} .navbar-nav .dropdown .dropdown-menu {
        @if(!empty($deskDropdownMenu))
        {!!$deskDropdownMenu!!}
        @endif
        & .nav-link {
            font-size: {{$deskTextSize - 2 }}px;
        }
    }

    @else

        @if(!empty($deskStyle))
        #{{$id}} #{{$id}}contentToMove #{{$id}}nav > ul {
            display: inline-flex;
            & .nav-link {
                color: {{ !empty($deskColor1) ? $deskColor1 : 'var(--dark)' }};
                position: relative;
                font-size: {{$deskTextSize}}px;
                font-weight: 500;
                padding: 0.5rem 21px;
                text-transform: {{$deskTextTransform}};
                @if(!empty($deskNav))
                {!!$deskNav!!}
                @endif
                &:hover {
                    color: {{ !empty($deskColor2) ? $deskColor2 : 'var(--primary)' }};
                    @if(!empty($deskNavHover))
                    {!!$deskNavHover!!}
                    @endif
                }
                @if(!empty($deskNavBefore))
                &:before {
                    {!! $deskNavBefore !!}
                }
                @endif
                @if(!empty($deskNavHoverBefore))
                &:hover:before {
                    {!! $deskNavHoverBefore !!}
                }
                @endif
            }
            & .dropdown .dropdown-menu {
                @if(!empty($deskDropdownMenu))
                    {!!$deskDropdownMenu!!}
                @endif
                & .nav-link {
                    font-size: {{$deskTextSize - 2 }}px;
                }
            }
        }
        @endif
    @endif

@endif
</style>
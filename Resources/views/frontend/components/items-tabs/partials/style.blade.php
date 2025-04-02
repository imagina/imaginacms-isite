<style>
@if(!empty($tabsNavStyle))
#{{$id}} ul.nav {
  {!!$tabsNavStyle!!}
}
@endif
@if(!empty($tabsNavLinkStyle))
#{{$id}} ul.nav .nav-link {
  {!!$tabsNavLinkStyle!!}
  @if(!empty($tabsNavLinkHoverStyle))
  &:hover {
    {!!$tabsNavLinkHoverStyle!!}
  }
  @endif
  @if(!empty($tabsNavLinkActiveStyle))
  &.active {
  {!!$tabsNavLinkActiveStyle!!}
  }
  @endif
}
@endif
@if(!empty($tabsContentStyle))
#{{$id}} .tab-content  {
   {!!$tabsContentStyle!!}
}
@endif
@if(!empty($tabBtnStyle))
#{{$id}} .button-tabs  {
   {!!$tabBtnStyle!!}
}
@endif
@if($itemListPag &&!empty($itemListPagStyleGeneral))
#{{$id}} .post-list-pagination {
  {!!$itemListPagStyleGeneral!!}
}
@endif

</style>
@if(!empty($title) || !empty($subtitle) || !empty($textVineta))
<style>
@if(!empty($title))
    #titleSection{{$id}} .title {
      font-size: {{$titleSize[0]}}px;
      line-height: {{$titleSize[0]}}px;
      @if(!empty($titleLetterSpacing)) letter-spacing: {{$titleLetterSpacing}}px; @endif
        @if(!empty($titleShadow)) text-shadow: {{$titleShadow}}; @endif
    }
    #titleSection{{$id}} .title.text-custom {
      color: {{$titleColor}};
    }
    @if(count($titleSize)>=2)
    @media (max-width: 767.98px) {
      #titleSection{{$id}} .title {
        font-size: {{$titleSize[1]}}px;
        line-height: {{$titleSize[1]}}px;
      }
    }
    @endif
    @if(count($titleSize)==3)
    @media (max-width: 575.98px) {
      #titleSection{{$id}} .title {
        font-size: {{$titleSize[2]}}px;
        line-height: {{$titleSize[2]}}px;
      }
    }
    @endif
@endif

@if(!empty($subtitle))
    #titleSection{{$id}} .subtitle {
      font-size: {{$subtitleSize[0]}}px;
      line-height: {{$subtitleSize[0]}}px;
      @if(!empty($subtitleLetterSpacing)) letter-spacing: {{$subtitleLetterSpacing}}px; @endif
        @if(!empty($subtitleShadow)) text-shadow: {{$subtitleShadow}}; @endif
    }
    #titleSection{{$id}} .subtitle.text-custom {
      color: {{$subtitleColor}};
    }
    @if(count($subtitleSize)>=2)
    @media (max-width: 767.98px) {
      #titleSection{{$id}} .subtitle {
        font-size: {{$subtitleSize[1]}}px;
        line-height: {{$subtitleSize[1]}}px;
      }
    }
    @endif
    @if(count($subtitleSize)==3)
    @media (max-width: 575.98px) {
      #titleSection{{$id}} .subtitle {
        font-size: {{$subtitleSize[2]}}px;
        line-height: {{$subtitleSize[2]}}px;
      }
    }
    @endif
@endif
@if(!empty($textVineta))
    #titleSection{{$id}} i.text-custom {
      color: {{$textVinetaColor}};
    }
    @endif
@if(!empty($textWithLine))
    @if($textWithLine==1)
    #titleSection{{$id}} .title:after {
      content: '';
      display: block;
    @foreach($textLineConfig as $key => $line)
     {{$key}}: {{$line}};
    @endforeach
    }
    @endif
    @if($textWithLine==2)
        #titleSection{{$id}} .subtitle:after {
      content: '';
      display: block;
      @foreach($textLineConfig as $key => $line)
      {{$key}}: {{$line}};
      @endforeach
    }
    @endif
@endif
</style>
@endif

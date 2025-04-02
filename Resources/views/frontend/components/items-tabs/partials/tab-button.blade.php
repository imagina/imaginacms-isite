@if($withTabBtn)
  <div class="tab-pane-btn {{$tabBtnAlign ?? ''}}">
    <a role="button" aria-label="{{trans('isite::common.button.tabSeeAll')}}" class="button-base {{$tabBtnClass ?? ''}} button-tabs"
       href="/tienda/c/{{$item->slug}}" target="_self">
      <span> {{trans("isite::common.button.tabSeeAll")}} </span>
    </a>
  </div>
@endif
<section id="contentTaps">
  @php($tabs = json_decode(setting('isite::item-tabs',null,"[]")))
  <h3 class="text-center title-1">{{$title}}</h3>
  <h5 class="text-center subtitle">{{$subtitle}}</h5>
  <ul class="nav nav-tabs products-tabs" role="tablist">
    @php($category = Modules\Iblog\Entities\Category::find($categoryId))
    @php($counter = 0)

    @foreach($category->children as $itemTab)
      @php($counter++)
      @php($counter == 1 ? $state = 'active' : $state = ' ')
      <li class="nav-item">
        <a class="nav-link {{$state}}" id="product-tab-{{$itemTab->id}}"
           data-toggle="tab" href="#tab-{{$itemTab->id}}" role="tab" aria-controls="home" aria-selected="true">
          {{$itemTab->title}}
        </a>
      </li>
{{--      {{dd($itemTab)}}--}}
    @endforeach
  </ul>
  <div class="tab-content border-top border-bottom border-white">
    @php($counter = 0)
    @foreach($category->children as $item)
      @if(isset($componentUse) && $componentUse != 'item-list' )
        @php($counter++)
        @php($counter == 1 ? $state = 'show active' : $state = ' ')
        <div class="tab-pane fade {{$state}}" id="tab-{{$item->id}}" role="tabpanel"
             aria-labelledby="product-tab-{{$item->id}}">
          <x-isite::carousel.owl-carousel
            id="carouselCategoryHome{{$item->id}}"
            :repository="$componentRepository"
            :params="['take' => 8, 'filter' => ['order' => ['way' => 'desc'],'categories' => [$item->id]]]"
            :margin="$componentMargin"
            :itemsBySlide="$componentItemsBySlide"
            :navText="$componentNavText"
            :responsive="$componentResponsive"
          />
        </div>
      @else
        @php($counter++)
        @php($counter == 1 ? $state = 'show active' : $state = ' ')
{{--              {{dd($componentFilter)}}--}}
        <div class="tab-pane fade {{$state}}" id="tab-{{$item->id}}" role="tabpanel"
             aria-labelledby="product-tab-{{$item->id}}">
          <livewire:isite::items-list
            moduleName="Iblog"
            itemComponentName="isite::item-list"
            itemComponentNamespace="Modules\Isite\View\Components\ItemList"
            :configLayoutIndex="config('asgard.isite.config.layoutIndexItemTabs')"
            :itemComponentAttributes="config('asgard.isite.config.indexItemListAttributesItemTabs')"
            :entityName="$componentEntityName"
            :showTitle="false"
            :params="['filter' => [$componentFilter => $item->id ?? null, 'withoutInternal' => true]]"
            :responsiveTopContent="['mobile'=>false,'desktop'=>false]"
          />
        </div>
      @endif
    @endforeach
  </div>
</section>

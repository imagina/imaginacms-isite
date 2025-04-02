<section id="{{$id}}" class="tab-section {{$tabsSection}}">

    @if(!empty($title) || !empty($subtitle) || !empty($textVineta))
    <div id="titleSection{{$id}}" class="title-section {{$textAlign}} {{$textClasses ?? ''}} @if($textPosition==3) d-flex flex-column @endif">
        @if(!empty($title) && $textPosition!=4)
            @if(!empty($textVineta) && $textVinetaPosition==1)
                <i class="{{ $textPosition==3 ? 'order-1':'' }} {{$textVineta}} {{$textVinetaColorClass}}"></i>
            @endif
            @if(isset($titleUrl))
                <a href="{{$titleUrl}}" target="{{$titleTarget ?? '_self'}}" class="text-decoration-none">
                    @endif
                    <div class="title {{$textPosition==3 ? 'order-1':'' }} {{$titleClasses}} {{$titleColorClass}} {{$titleWeight}} {{$titleTransform}}">
                        @if(!empty($textVineta) && $textVinetaPosition==3) <i class="{{$textVineta}} {{$textVinetaColorClass}}"></i> @endif
                        <span> {!! $title !!}</span>
                        @if(!empty($textVineta) && $textVinetaPosition==4) <i class="{{$textVineta}} {{$textVinetaColorClass}}"></i> @endif
                    </div>
                    @if(isset($titleUrl))
                </a>
            @endif
            @if(!empty($textVineta) && $textVinetaPosition==2)
                <i class="{{$textPosition==3 ? 'order-2':'' }} {{$textVineta}} {{$textVinetaColorClass}}"></i>
            @endif
        @endif

        @if(!empty($subtitle) && $textPosition!=1)
            @if(!empty($textVineta) && $textVinetaPosition==5)
                <i class="{{$textPosition==3 ? 'order-0':'' }} {{$textVineta}} {{$textVinetaColorClass}}"></i>
            @endif
            <div class="subtitle {{$textPosition==3 ? 'order-0':'' }} {{$subtitleClasses}} {{$subtitleColorClass}} {{$subtitleWeight}} {{$subtitleTransform}}">
                {!! $subtitle !!}
            </div>
            @if(!empty($textVineta) && $textVinetaPosition==6)
                <i class="{{$textVineta}} {{$textVinetaColorClass}}"></i>
            @endif
        @endif
    </div>
    @endif


  @if(isset($categories) && count($categories)>0)
    <ul class="nav {{$tabsNav}}" role="tablist">
        @foreach($categories as $index => $itemTab)
          <li class="nav-item">
            <a class="nav-link @if($index === 0) active @endif"
               id="item-tab-{{$itemTab->id}}-{{$componentEntityName}}" aria-controls="tab-{{$itemTab->id}}-{{$componentEntityName}}"
               data-toggle="tab" href="#tab-{{$itemTab->id}}-{{$componentEntityName}}" role="tab"
               aria-selected="{{$index === 0 ? true : false }}">
              {{$itemTab->title}}
            </a>
          </li>
        @endforeach
    </ul>

    <div class="tab-content {{$tabsContent}}">

      @foreach($categories as $index => $item)

        @if(isset($componentUse) && $componentUse != 'item-list')

          <div class="tab-pane fade @if($index === 0) active show @endif" id="tab-{{$item->id}}-{{$componentEntityName}}" role="tabpanel"
               aria-labelledby="item-tab-{{$item->id}}-{{$componentEntityName}}">

            <x-isite::carousel.owl-carousel
                    id="carouselCategoryItems{{$item->id}}"
                    :repository="$componentRepository"
                    :responsive="$componentResponsive"
                    :params="['take' => $carouselAttr['take'] ?? 8, 'filter' => ['order' => ['way' => 'desc'],$componentFilter => $item->id]]"
                    :margin="$carouselAttr['margin'] ?? 20"
                    :itemsBySlide="$componentItemsBySlide"
                    :dotsStyle="$carouselAttr['dotsStyle'] ?? 'dots-linear'"
                    :dotsStyleColor="$carouselAttr['dotsStyleColor'] ?? 'primary'"
                    :dotsSize="$carouselAttr['dotsSize'] ?? ''"
                    :center="$carouselAttr['center'] ?? false"
                    :stagePadding="$carouselAttr['stagePadding'] ?? 0"
                    :loop="$carouselAttr['loops'] ?? false"
                    :dots="$carouselAttr['dots'] ?? false"
                    :mediaImage="$carouselAttr['mediaImage'] ?? mainimage"
                    :autoplay="$carouselAttr['autoplay'] ?? false"
                    :containerFluid="$carouselAttr['container'] ?? false"
                    :nav="$carouselAttr['nav'] ?? false"
                    :navIcon="$carouselAttr['navIcon'] ?? 'arrow'"
                    :navPosition="$carouselAttr['navPosition'] ?? 'bottom'"
                    :navSizeLabel="$carouselAttr['navSizeLabel'] ?? 15"
                    :navColor="$carouselAttr['navColor'] ?? 'primary'"
                    :navStyleButton="$carouselAttr['navStyleButton'] ?? ''"
                    :navSizeButton="$carouselAttr['navSizeButton'] ?? 'button-link'"
                    :itemComponentAttributes="$componentItemComponentAttributes"
            />

            @include('isite::frontend.components.items-tabs.partials.tab-button')

          </div>
        @else

          <div class="tab-pane fade @if($index === 0) active show @endif" id="tab-{{$item->id}}-{{$componentEntityName}}" role="tabpanel"
               aria-labelledby="item-tab-{{$item->id}}-{{$componentEntityName}}">

            <livewire:isite::items-list
                    :moduleName="$componentModuleName"
                    :itemComponentName="$componentName"
                    :itemComponentNamespace="$componentNameSpace"
                    :itemComponentAttributes="$componentItemComponentAttributes"
                    :entityName="$componentEntityName"
                    :configLayoutIndex="$componentConfigLayoutIndex"
                    :showTitle="false"
                    :pagination="[ 'show' => $itemListPag, 'type' => $itemListPagType]"
                    :params="['take' => $itemListTake,'filter' => [$componentFilter => $item->id ?? null, 'withDiscount' => false]]"
                    :responsiveTopContent="['mobile'=>false,'desktop'=>false]"
            />

            @include('isite::frontend.components.items-tabs.partials.tab-button')

          </div>
        @endif
      @endforeach
    </div>
  @else
    <div class="alert alert-danger {{$alertClass}}" role="alert">
      {{trans("isite::common.viewErrors.msnAlert") }}
    </div>
  @endif
</section>
@include('isite::frontend.components.items-tabs.partials.style')
@section('scripts-owl')
  @parent
  <script>
    document.querySelector("#{{$id}} .no-items.alert-danger").classList.add(..."{{ $alertClass }}".split(" "));
  </script>
@stop

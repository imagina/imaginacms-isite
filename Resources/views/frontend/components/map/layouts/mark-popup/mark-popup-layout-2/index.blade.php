<div class="mark-popup mark-popup-layout-2">
@foreach($items as $item)
    <div class="mark-popup-card">
        <div class="mark-popup-picture">
          <x-media::single-image :alt="$item->title"
                                 :title="$item->title"
                                 :isMedia="true"
                                 imgClasses="mark-popup-img"
                                 :mediaFiles="$item->mediaFiles()"/>
        </div>
        <div class="mark-popup-body">
            <div class="row no-gutters">
                <div class="col-auto mr-2">
                    @foreach($item->categories as $category)
                        @if($category->parent_id == 2)
                            <div class="icon">
                                @if(isset($category->mediaFiles()->mainimage) &&
                                        !empty($category->mediaFiles()->mainimage) &&
                                         strpos($category->mediaFiles()->mainimage->extraLargeThumb, 'default.jpg') == false)
                                    <x-media::single-image
                                            imgClasses="icon"
                                            :mediaFiles="$category->mediaFiles()"
                                            :isMedia="true" :alt="$category->title"
                                    />
                                @else
                                    <x-media::single-image
                                            imgClasses="icon"
                                            setting="icustom::imageDefault"/>
                                @endif
                            </div>
                            <div class="mark-popup-small"> {{$category->title}}</div>
                        @endif
                    @endforeach
                </div>
                <div class="col">
                    @foreach($item->fields as $field)
                        @if(isset($field->name) && ($field->name == 'bpin'))
                            <div class="mark-popup-title">
                                {{ trans('icustom::common.crudFields.bpni') }}
                            </div>
                            <div class="mark-popup-text">
                                {{$field->value}}
                            </div>
                        @endif
                    @endforeach
                    @if(!empty($item->min_price))
                     <div class="mark-popup-title">{{ trans('icustom::common.crudFields.worth') }}</div>
                        <div class="mark-popup-text text-color">{{"$" . number_format($item->min_price, 0, ",", ".")}}</div>
                    @endif
                </div>
                @if(isset($item->city->name))
                <div class="col-12">
                    <div class="mark-popup-footer">
                        <i class="fa fa-map-marker"></i>
                        {{$item->city->name}}, {{$item->province->name ?? ""}}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
</div>
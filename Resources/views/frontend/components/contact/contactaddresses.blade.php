@if(!empty($addresses))
    <div id="componentContactAddresses">
        <div class="d-flex">
            @if($showIcon)
            <i class="{{$icon}} align-self-center mr-2"></i>
            @endif
            <div class="content-address">
                @foreach($addresses as $key => $addresses)
                    @if($key > 0)&nbsp;-&nbsp;@endif
                    <div class="d-inline-block">{{$addresses}}</div>
                @endforeach
            </div>
        </div>
    </div>
@endif

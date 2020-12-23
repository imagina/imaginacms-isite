@if(!empty($phones))
  <!--phone content-->
  <div id="componentContactPhones">
    <div class="d-flex">
      <!--icon-->
      @if($showIcon)
        <i class="{{$icon}} align-self-center mr-2"></i>
      @endif
      <div class="content-phone">
        @foreach($phones as $key => $phone)
          @if($key > 0) - @endif
        <!--phone-->
          <a class="d-inline-block" href="tel:{{$phonesReplaced[$key]}}">{{$phone}}</a>
        @endforeach
      </div>
    </div>
  </div>
@endif

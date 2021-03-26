@foreach($items as $item)
  
  <div class="{{$layoutClass}} {{$itemMainClass}}" onclick="checkModal({{$item->id}})" >

    <?php
    $hash = sha1($itemComponentNamespace);
    if (isset($component)) {
      $__componentOriginal{$hash} = $component;
    }
    $component = $__env->getContainer()->make($itemComponentNamespace, array_merge($itemComponentAttributes, ["item" => $item]));
    $component->withName($itemComponentName);
    if ($component->shouldRender()):
      $__env->startComponent($component->resolveView(), $component->data());
      if (isset($__componentOriginal{$hash})):
        $component = $__componentOriginal{$hash};
        unset($__componentOriginal{$hash});
      endif;
      echo $__env->renderComponent();
    endif;
    ?>
  
  </div>

@endforeach

@section('scripts-owl')
  @parent
    <script type="text/javascript">

      function checkMobile(){
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if(width <= 992) {
          return true;
        }else{
          return false;
        }
      }

      function checkModal(itemId){

        var mobile = checkMobile();

        var itemMobile = {!! $itemModal['mobile'] ? 'true' : 'false' !!}
        var itemDesktop = {!! $itemModal['desktop'] ? 'true' : 'false' !!}

        if(!mobile && itemDesktop){
          window.livewire.emit('itemModalLoadData',itemId)
        }else{
          if(mobile && itemMobile){
            window.livewire.emit('itemModalLoadData',itemId)
          }
        }

       
      }

    </script>
@stop
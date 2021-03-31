@foreach($items as $item)
  <div class="{{$layoutClass}} {{$entityName}}">
    
    
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
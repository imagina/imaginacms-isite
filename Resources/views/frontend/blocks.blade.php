@extends('isite::frontend.layouts.blank')

@section("content")
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2">

        <?php
        $itemComponentName = "isite::item-list";
        $itemComponentNamespace = "Modules\Isite\View\Components\ItemList";

        $hash = sha1($itemComponentNamespace);

        if (isset($component)) {
          $__componentOriginal{$hash} = $component;
        }
        $component = $__env->getContainer()->make($itemComponentNamespace, array_merge((array)$attributes["mainAttributes"], ["item" => $item]));
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
    </div>
  </div>
@stop

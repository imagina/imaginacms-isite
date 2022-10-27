<section id="block{{$id}}">
  <div id="container{{$id}}"
       class="{{$container}}
       {{$columns}}
       {{$borderForm}}
       {{$display}}
         "
       style="
         width:{{$widthContainer}};
         height:{{$heightContainer}};
         background:{{$background}};
         background-color:{{$backgroundColor}};
         padding:{{$paddingX.' '.$paddingY}};
         margin:{{$marginX.' '.$marginY}};
         ">
    @if(!empty($overlay))
      <div id="overlay{{$id}}">

      </div>
    @endif
    <div id="component{{$id}}">
      @if(empty($componentLivewire))
        @if(!empty($itemComponentNamespace))
          <?php
          $hash = sha1($itemComponentNamespace);
          if (isset($component)) {
            $__componentOriginal{$hash} = $component;
          }
          $component = $__env->getContainer()->make($itemComponentNamespace, $itemComponentAttributes ?? []);
          $component->withName($itemComponent);
          if ($component->shouldRender()):
            $__env->startComponent($component->resolveView(), $component->data());
            if (isset($__componentOriginal{$hash})):
              $component = $__componentOriginal{$hash};
              unset($__componentOriginal{$hash});
            endif;
            echo $__env->renderComponent();
          endif;
          ?>
        @endif
      @endif
    </div>
  </div>
</section>

<style>
    #container{{$id}}       {
        position: relative;
    }

    @if(!empty($overlay))
       #overlay{{$id}}       {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0%;
        right: 0%;
        background-color: {{$overlay["color"] ?? 'rgba(0,0,0,0.5)'}};
        z-index: {{$overlay["z-index"] ?? 2}};
    }
  @endif
</style>

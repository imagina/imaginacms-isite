<section id="block{{$id}}">
  <div id="container{{$id}}"
       class="{{$container}} {{$columns}} {{$borderForm}} {{$display}} {{$blockClasses}}"
       style="
         width:{{$widthContainer}};
         height:{{$heightContainer}};
         background:{{$background}};
         background-color:{{$backgroundColor}};
         padding:{{$paddingX.' '.$paddingY}};
         margin:{{$marginX.' '.$marginY}};
         ">
    <!--Overlay-->
    @if(!empty($overlay))
      <div id="overlay{{$id}}"></div>
    @endif
    <!--Dynamic Component-->
    <div id="component{{$id}}">
      @php
        $componentName = $componentConfig["systemName"];
        $nameSpace = $componentConfig["nameSpace"];
        $attributes = $componentConfig["attributes"];
      @endphp

      <!--blade Component-->
      @if($componentType == "blade")
        @if(!empty($nameSpace))
          <?php
          $hash = sha1($nameSpace);
          if (isset($component)) {
            $__componentOriginal{$hash} = $component;
          }
          $component = $__env->getContainer()->make($nameSpace, $attributes ?? []);
          $component->withName($componentName);
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
      <!--Livewire Component-->
      @if($componentType == "livewire")
        @livewire($componentName, $attributes)
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

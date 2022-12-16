<section id="block{{$blockConfig->attributes->mainblock->id ?? $id}}"
         class="{{$blockConfig->attributes->mainblock->blockClasses ?? $blockClasses}}">

    <x-isite::edit-link link="/iadmin/#/builder/blocks/" tooltip="{{$tooltipEditLink}}"/>

    @if($blockConfig->attributes->mainblock->overlay ?? $overlay)
    <!--Overlay-->
    <div id="overlay{{$blockConfig->attributes->mainblock->id ?? $id}}"></div>
    @endif
    <div id="container{{$blockConfig->attributes->mainblock->id ?? $id}}"
         class="{{$blockConfig->attributes->mainblock->container ?? $container}}">
        <div class="row {{$blockConfig->attributes->mainblock->row ?? $row}}">
            <div class="{{$blockConfig->attributes->mainblock->columns ?? $columns}} ">

            <!--Dynamic Component-->
                <div id="component{{$blockConfig->attributes->mainblock->id ?? $id}}">
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
        </div>
    </div>
</section>
<style>

    #block{{$blockConfig->attributes->mainblock->id ?? $id}}  {
        position: relative;
        @if($blockConfig->attributes->mainblock->backgroundColor)
        background: {{$blockConfig->attributes->mainblock->backgroundColor}};
        @endif
    }
    @if($blockConfig->attributes->mainblock->blockStyle)
          {!!$blockConfig->attributes->mainblock->blockStyle!!}
    @endif

    #block{{$blockConfig->attributes->mainblock->id ?? $id}} > .editLink  {
        top: 5% !important;
        left: 2% !important;
    }

    @if(!empty($blockConfig->attributes->mainblock->overlay))
       #overlay{{$blockConfig->attributes->mainblock->id ?? $id}} {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0%;
        right: 0%;
        }
    @endif
</style>

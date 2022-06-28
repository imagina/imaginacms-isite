<div id="multiLangLayout3" class="multi-lang">
  
  <div class="dropdown">
    <?php
    $hash = sha1($butonComponentNamespace);
    if (isset($component)) {
      $__componentOriginal{$hash} = $component;
    }
    $component = $__env->getContainer()->make($butonComponentNamespace, array_merge([
      'idButton' => 'buttonDropdownMultilang',
      'label' => $longText ? config('available-locales')[LaravelLocalization::getCurrentLocale()]['native'] : LaravelLocalization::getCurrentLocale(),
      'withLabel' => true,
      'buttonClasses' => 'btn btn-sm dropdown-toggle text-capitalize'
    ], $buttonComponentAtributtes ?? []));
    $component->withName($butonComponent);
    if ($component->shouldRender()):
      $__env->startComponent($component->resolveView(), $component->data());
      if (isset($__componentOriginal{$hash})):
        $component = $__componentOriginal{$hash};
        unset($__componentOriginal{$hash});
      endif;
      echo $__env->renderComponent();
    endif;
    ?>
    
    <div class="dropdown-menu dropdown-menu-right  p-2" aria-labelledby="{{$component->idButton}}">
      @foreach($locales as $locale)
        @if($showImage)
          <?php
          $hash = sha1($imageComponentNamespace);
          if (isset($component)) {
            $__componentOriginal{$hash} = $component;
          }
          $component = $__env->getContainer()->make($imageComponentNamespace, array_merge([
            'src' => url('modules/isite/img/locales/' . $locale . '.jpg'),
            'imgStyles' => 'width: 35px; height: 30px; object-fit:cover',
            'imgClasses' =>'rounded-circle mx-2'
          ], $imageComponentAtributtes ?? []));
          $component->withName($butonComponent);
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
  
      @if($showButton)
          <?php
          $hash = sha1($butonComponentNamespace);
          if (isset($component)) {
            $__componentOriginal{$hash} = $component;
          }
          $component = $__env->getContainer()->make($butonComponentNamespace, array_merge([
            'label' => $longText ? config('available-locales')[$locale]['native'] : $locale,
            'href' => $locale,
            'withLabel' => true,
            'buttonClasses' => 'text-white text-left btn-lg border-0 text-capitalize',
            'style' => 'outline'
          ], $buttonDropDownItemComponentAtributtes ?? []));
          $component->withName($butonComponent);
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
        
      @endforeach
    </div>
  </div>
</div>
<script type="text/javascript">
  let $buttonDropdownMultiLang = document.getElementById('{{$component->idButton}}')
  $buttonDropdownMultiLang.setAttribute('data-toggle', 'dropdown')
</script>


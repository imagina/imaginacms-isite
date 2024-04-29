<div id="multilanglayout1" class="multilang {{$multiflagClasses}}">
  @foreach($locales as $locale)
    @include('isite::frontend.components.multilang.partials.image', array(
      'styleFlag' => !empty($flagStyles) ? $flagStyles : 'width: 50px; height: 27px;',
      'classFlag' => $flagClasses,
      'locale' => $locale)
    )
    @if($showButton)
      <?php
      $hash = sha1($butonComponentNamespace);
      if (isset($component)) {
        $__componentOriginal{$hash} = $component;
      }
      $component = $__env->getContainer()->make($butonComponentNamespace, array_merge([
        'label' => $locale,
        'href' => setLocaleInUrl($locale),
        'withLabel' => true,
        'buttonClasses' => !empty($linkClasses) ? $linkClasses : 'btn px-2 border-0 text-capitalize',
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
    @endif
  @endforeach
</div>
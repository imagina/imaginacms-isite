@if($showImage)
  <?php
  $hash = sha1($imageComponentNamespace);
  if (isset($component)) {
    $__componentOriginal[$hash] = $component;
  }
  $component = $__env->getContainer()->make($imageComponentNamespace, array_merge([
    'src' => url($localesUrl . $locale . '.jpg'),
    'imgStyles' => $styleFlag ?? '',
    'imgClasses' => $classFlag ?? '',
    'url' => LaravelLocalization::getCurrentLocale(),
  ], $imageComponentAtributtes ?? []));
  $component->withName($imageComponent);
  if ($component->shouldRender()):
    $__env->startComponent($component->resolveView(), $component->data());
    if (isset($__componentOriginal[$hash])):
      $component = $__componentOriginal[$hash];
      unset($__componentOriginal[$hash]);
    endif;
    echo $__env->renderComponent();
  endif;
  ?>
@endif
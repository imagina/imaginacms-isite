<?php

if (!function_exists('alternate')) {

    function alternate($model)
    {
  
      $alternate = [];
      $supportedLocales = config("laravellocalization.supportedLocales");
  
      if(count($supportedLocales) == 1) return $alternate;
  
      $translations = $model->getTranslationsArray() ?? [];

      foreach ($translations as $locale => $data) {
        if(isset($data['slug'])){
          $href = \URL::to('/'.$locale.'/'.$data['slug']);
          $alternate[$locale] = [
            "slug" => $data['slug'],
            "link" => "<link rel='alternate' hreflang='$locale' href='$href'>"
          ];
        }
        
      }
      
      return $alternate;

    }
}

<?php

return [
  
  'logo1' => [
    'description'  => 'isite::common.settings.logo1',
    'view'         => 'isite::admin.fields.file',
  ],
  
  'logo2' => [
    'description'  => 'isite::common.settings.logo2',
    'view'         => 'isite::admin.fields.file',
  ],
  'logo3' => [
    'description'  => 'isite::common.settings.logo3',
    'view'         => 'isite::admin.fields.file',
  ],
  'favicon' => [
    'description'  => 'isite::common.settings.favicon',
    'view'         => 'isite::admin.fields.file',
  ],
  
  'brandPrimary' => [
    'description'  => 'isite::common.settings.brandPrimary',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandSecondary' => [
    'description'  => 'isite::common.settings.brandSecondary',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandTertiary' => [
    'description'  => 'isite::common.settings.brandTertiary',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandNeutral' => [
    'description'  => 'isite::common.settings.brandNeutral',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandPositive' => [
    'description'  => 'isite::common.settings.brandPositive',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandInfo' => [
    'description'  => 'isite::common.settings.brandInfo',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandWarning' => [
    'description'  => 'isite::common.settings.brandWarning',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandLigth' => [
    'description'  => 'isite::common.settings.brandLigth',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandDark' => [
    'description'  => 'isite::common.settings.brandDark',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandReservation' => [
    'description'  => 'isite::common.settings.brandReservation',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandIndex' => [
    'description'  => 'isite::common.settings.brandIndex',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandTextSecondary' => [
    'description'  => 'isite::common.settings.brandTextSecondary',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandShadowColor' => [
    'description'  => 'isite::common.settings.brandShadowColor',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandProgressTrack' => [
    'description'  => 'isite::common.settings.brandProgressTrack',
    'view'         => 'isite::admin.fields.color',
  ],
  'brandItemSide' => [
    'description'  => 'isite::common.settings.brandItemSide',
    'view'         => 'isite::admin.fields.color',
  ],
  
  
  'phones' => [
    'description'  => 'isite::common.settings.phones',
    'view'         => 'isite::admin.fields.text-multi',
    'input'         => 'number'
  ],
  'addresses' => [
    'description'  => 'isite::common.settings.addresses',
    'view'         => 'isite::admin.fields.text-multi',
    'input'         => 'text'
  ],
  'emails' => [
    'description'  => 'isite::common.settings.emails',
    'view'         => 'isite::admin.fields.text-multi',
    'input'         => 'text'
  ],
  'socialNetworks' => [
    'description'  => 'isite::common.settings.socialNetworks',
    'view'         => 'isite::admin.fields.text-multi-with-options',
    'options'      => [
      [
        'label' => 'Facebook',
        'value' => 'facebook'
      ],
      [
        'label' => 'Twitter',
        'value' => 'twitter'
      ],
      [
        'label' => 'Instagram',
        'value' => 'instagram'
      ],
      [
        'label' => 'Linkedin',
        'value' => 'linkedin'
      ],
      [
        'label' => 'Google +',
        'value' => 'googleplus'
      ],
      [
        'label' => 'Skype',
        'value' => 'skype'
      ]
      
    ]
  ],
  
  /*
  'branchOffices' => [
    'description'  => 'isite::common.settings.branchOffices',
    'view'         => 'color',
  ],*/



];
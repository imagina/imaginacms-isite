<?php

return [
  'logo1' => [
    'description' => 'isite::common.settings.logo1',
    'view' => 'isite::admin.fields.file',
  ],
  'logo1' => [
    'description' => 'isite::common.settings.logo1',
    'view' => 'isite::admin.fields.file',
  ],
  'logo2' => [
    'description' => 'isite::common.settings.logo2',
    'view' => 'isite::admin.fields.file',
  ],
  'logo3' => [
    'description' => 'isite::common.settings.logo3',
    'view' => 'isite::admin.fields.file',
  ],
  'favicon' => [
    'description' => 'isite::common.settings.favicon',
    'view' => 'isite::admin.fields.file',
  ],
  'brandPrimary' => [
    'description' => 'isite::common.settings.brandPrimary',
    'view' => 'isite::admin.fields.color',
  ],
  'brandSecondary' => [
    'description' => 'isite::common.settings.brandSecondary',
    'view' => 'isite::admin.fields.color',
  ],
  'brandTertiary' => [
    'description' => 'isite::common.settings.brandTertiary',
    'view' => 'isite::admin.fields.color',
  ],
  'brandPositive' => [
    'description' => 'isite::common.settings.brandPositive',
    'view' => 'isite::admin.fields.color',
  ],
  'brandNegative' => [
    'description' => 'isite::common.settings.brandNegative',
    'view' => 'isite::admin.fields.color',
  ],
  'brandFaded' => [
    'description' => 'isite::common.settings.brandFaded',
    'view' => 'isite::admin.fields.color',
  ],
  'brandInfo' => [
    'description' => 'isite::common.settings.brandInfo',
    'view' => 'isite::admin.fields.color',
  ],
  'brandWarning' => [
    'description' => 'isite::common.settings.brandWarning',
    'view' => 'isite::admin.fields.color',
  ],
  'brandLight' => [
    'description' => 'isite::common.settings.brandLight',
    'view' => 'isite::admin.fields.color',
  ],
  'brandDark' => [
    'description' => 'isite::common.settings.brandDark',
    'view' => 'isite::admin.fields.color',
  ],


  'phones' => [
    'description' => 'isite::common.settings.phones',
    'view' => 'text-multi',
    'input' => 'number'
  ],
  'addresses' => [
    'description' => 'isite::common.settings.addresses',
    'view' => 'text-multi',
    'input' => 'text'
  ],
  'emails' => [
    'description' => 'isite::common.settings.emails',
    'view' => 'text-multi',
    'input' => 'text'
  ],
  'socialNetworks' => [
    'description' => 'isite::common.settings.socialNetworks',
    'view' => 'text-multi-with-options',
    'options' => [
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

  'branchOffices' => [
    'description' => 'isite::common.settings.branchOffices',
    'view' => 'text-multi',
    'input' => 'text'
  ],
  //Keys recaptcha google
  'reCaptchaV2Secret' => [
    'description' => 'isite::common.settings.reCaptchaV2Secret',
    'view' => 'text',
  ],
  'reCaptchaV2Site' => [
    'description' => 'isite::common.settings.reCaptchaV2Site',
    'view' => 'text',
  ],
  'reCaptchaV3Secret' => [
    'description' => 'isite::common.settings.reCaptchaV3Secret',
    'view' => 'text',
  ],
  'reCaptchaV3Site' => [
    'description' => 'isite::common.settings.reCaptchaV3Site',
    'view' => 'text',
  ],
  //Google maps KEY
  'api-maps' => [
    'description'  => 'isite::common.settings.apimaps',
    'view'         => 'text',
  ],
];

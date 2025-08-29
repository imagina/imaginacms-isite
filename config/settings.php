<?php

return [

  /**
   * =======================================
   * SITE - isite
   * =======================================
   */
  'siteName' => [
    'name' => 'isite::site-name',
    'default' => 'My Site',
    'isTranslatable' => true,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.site-name'
      ]
    ]
  ],
  'siteNameMini' => [
    'name' => 'isite::site-name-mini',
    'default' => 'my site',
    'isTranslatable' => true,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.site-name-mini'
      ],
    ]
  ],
  'siteDescription' => [
    'name' => 'isite::site-description',
    'default' => null,
    'isTranslatable' => true,
    'dynamicField' => [
      'type' => 'input',
      'columns' => 'col-12',
      'props' => [
        'label' => 'isite::settings.site-description',
        'type' => 'textarea',
        'rows' => 3,
      ],
    ]
  ],
  'defaultLocale' => [
    'name' => 'isite::defaultLocale',
    'default' => env('APP_LOCALE', 'es'),
    'dynamicField' => [
      'type' => 'input',
      'props' => [
        'label' => 'isite::settings.defaultLocales'
      ],
    ]
  ],
  'locales' => [
    'name' => 'isite::locales',
    'default' => ['es'],
    'dynamicField' => [
      'type' => 'treeSelect',
      "onlySuperAdmin" => true,
      'columns' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.locales',
        'multiple' => true,
        'sortdefaultBy' => 'ORDER_SELECTED'
      ],
      'loadOptions' => [
        'apiRoute' => 'apiRoutes.qsite.siteSettings',
        'select' => ['label' => 'name', 'id' => 'iso'],
        'requestParams' => ['filter' => ['settingGroupName' => 'availableLocales']]
      ]
    ]
  ],


  /**
   * =======================================
   * MEDIA
   * =======================================
   */
  'logo1' => [
    'default' => (object)['mainimage' => null],
    'name' => 'isite::logo1',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'isite::settings.groups.media.title',
      'props' => [
        'label' => 'isite::settings.logo1',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],

  'logo2' => [
    'default' => (object)['mainimage' => null],
    'name' => 'isite::logo2',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'isite::settings.groups.media.title',
      'props' => [
        'label' => 'isite::settings.logo2',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'logo3' => [
    'default' => (object)['mainimage' => null],
    'name' => 'isite::logo3',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'isite::settings.groups.media.title',
      'props' => [
        'label' => 'isite::settings.logo3',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'logoIadmin' => [
    'default' => (object)['mainimage' => null],
    'name' => 'isite::logoIadmin',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'isite::settings.groups.media.title',
      'props' => [
        'label' => 'isite::settings.logoIadmin',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'logoIadminSM' => [
    'default' => (object)['mainimage' => null],
    'name' => 'isite::logoIadminSM',
    'isMedia' => 'media_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'isite::settings.groups.media.title',
      'props' => [
        'label' => 'isite::settings.logoIadminSM',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  'favicon' => [
    'default' => (object)['mainimage' => null],
    'name' => 'isite::favicon',
    'isMedia' => 'medias_single',
    'dynamicField' => [
      'type' => 'media',
      'groupName' => 'media',
      'groupTitle' => 'isite::settings.groups.media.title',
      'props' => [
        'label' => 'isite::settings.favicon',
        'zone' => 'mainimage',
        'entity' => "Modules\Isetting\Models\Setting",
        'entityId' => null
      ]
    ]
  ],
  //Colors
  'brandPrimary' => [
    'name' => 'isite::brandPrimary',
    'default' => '#027be3',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.brandPrimary'
      ]
    ]
  ],
  'primaryContrast' => [
    'name' => 'isite::primaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.primaryContrast'
      ]
    ]
  ],
  'brandSecondary' => [
    'name' => 'isite::brandSecondary',
    'default' => '#26a69a',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.brandSecondary'
      ]
    ]
  ],
  'secondaryContrast' => [
    'name' => 'isite::secondaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.secondaryContrast'
      ]
    ]
  ],
  'brandTertiary' => [
    'name' => 'isite::brandTertiary',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.brandTertiary'
      ]
    ]
  ],
  'tertiaryContrast' => [
    'name' => 'isite::tertiaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.tertiaryContrast'
      ]
    ]
  ],
  'brandQuaternary' => [
    'name' => 'isite::brandQuaternary',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.brandQuaternary'
      ]
    ]
  ],
  'quaternaryContrast' => [
    'name' => 'isite::quaternaryContrast',
    'default' => null,
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'quickSetting' => true,
      'props' => [
        'label' => 'isite::settings.quaternaryContrast'
      ]
    ]
  ],
  'brandAddressBar' => [
    'name' => 'isite::brandAddressBar',
    'default' => '#027be3',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.addressBar'
      ]
    ]
  ],
  'brandAccent' => [
    'name' => 'isite::brandAccent',
    'default' => '#9c27b0',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.brandAccent'
      ]
    ]
  ],
  'brandPositive' => [
    'default' => '#21ba45',
    'name' => 'isite::brandPositive',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.brandPositive'
      ]
    ]
  ],
  'brandNegative' => [
    'default' => '#c10015',
    'name' => 'isite::brandNegative',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.brandNegative'
      ]
    ]
  ],
  'brandInfo' => [
    'default' => '#31ccec',
    'name' => 'isite::brandInfo',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.brandInfo'
      ]
    ]
  ],
  'brandWarning' => [
    'default' => '#f2c037',
    'name' => 'isite::brandWarning',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.brandWarning'
      ]
    ]
  ],
  'brandDark' => [
    'default' => '#1d1d1d',
    'name' => 'isite::brandDark',
    'dynamicField' => [
      'type' => 'inputColor',
      'groupName' => 'colors',
      'groupTitle' => 'isite::settings.groups.colors.title',
      'colClass' => 'col-12 col-md-6',
      'props' => [
        'label' => 'isite::settings.brandDark'
      ]
    ]
  ],


  'iadminTheme' => [
    'name' => 'isite::iadminTheme',
    'default' => '1',
    'dynamicField' => [
      'type' => 'select',
      'props' => [
        'label' => 'isite::common.settings.cms.iadminTheme.title',
        'options' => [
          ['label' => 'isite::common.settings.cms.iadminTheme.theme1', 'value' => '1'],
          ['label' => 'isite::common.settings.cms.iadminTheme.theme2', 'value' => '2'],
        ]
      ]
    ]
  ],
  'showGoToSiteButton' => [
    'name' => 'isite::showGoToSiteButton',
    'default' => '1',
    'dynamicField' => [
      'type' => 'select',
      'props' => [
        'label' => 'isite::common.settings.cms.showGoToSiteButton',
        'options' => [
          ['label' => 'isite::common.yes', 'value' => '1'],
          ['label' => 'isite::common.no', 'value' => '0'],
        ]
      ],
    ]
  ],
  'offline' => [
    'name' => 'isite::offline',
    'default' => '0',
    'dynamicField' => [
      'type' => 'select',
      'groupName' => 'cms',
      'groupTitle' => 'isite::common.settingGroups.cms',
      'props' => [
        'label' => 'isite::common.settings.cms.offline',
        'options' => [
          ['label' => 'isite::common.yes', 'value' => '1'],
          ['label' => 'isite::common.no', 'value' => '0'],
        ]
      ]
    ]
  ],
  'enableDynamicFieldsCache' => [
    'name' => 'isite::enableDynamicFieldsCache',
    'default' => "0",
    'dynamicField' => [
      'type' => 'checkbox',
      'props' => [
        'label' => 'isite::common.settings.enableDynamicFieldsCache',
        'trueValue' => "1",
        'falseValue' => "0",
      ]
    ]
  ],
];

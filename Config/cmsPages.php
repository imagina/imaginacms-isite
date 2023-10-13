<?php

return [
  'admin' => [
    "index" => [
      "permission" => "isite.settings.manage",
      "activated" => true,
      "path" => "/site/settings",
      "name" => "app.site.settings",
      "page" => "qsite/_pages/admin/settings/index",
      "layout" => "qsite/_layouts/master.vue",
      "title" => "isite.cms.sidebar.adminIndex",
      "icon" => "fas fa-cog",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true
      ]
    ],
    "organizationsWizard" => [
      "permission" => null,
      "authenticated" => false,
      "activated" => true,
      "path" => "/site/organizations-wizard",
      "name" => "qsite.admin.organizations.wizard",
      "page" => "qsite/_pages/admin/organizations/wizard",
      "layout" => "qsite/_layouts/blank.vue",
      "title" => "isite.cms.sidebar.adminOrganizationWizard",
      "icon" => "fas fa-crown"
    ],
    "organizationsAll" => [
      "permission" => "isite.organizations.index-all",
      "activated" => true,
      "path" => "/site/all-organizations",
      "name" => "qsite.admin.organizations.index-all",
      "crud" => "qsite/_crud/organizations",
      "page" => "qcrud/_pages/admin/crudPage",
      "layout" => "qsite/_layouts/master.vue",
      "title" => "isite.cms.sidebar.adminOrganizationAll",
      "icon" => "fas fa-crown",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true
      ]
    ],
    "organizations" => [
      "permission" => "isite.organizations.index",
      "activated" => true,
      "path" => "/site/my-organizations",
      "name" => "qsite.admin.organizations.index",
      "page" => "qsite/_pages/admin/organizations/index",
      "layout" => "qsite/_layouts/master.vue",
      "title" => "isite.cms.sidebar.adminOrganization",
      "icon" => "fas fa-crown",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true
      ]
    ],
    "organizationForm" => [
      "permission" => "isite.organizations.edit",
      "activated" => true,
      "path" => "/site/organizations/:id",
      "name" => "qsite.admin.organizations.update",
      "page" => "qsite/_pages/admin/organizations/form",
      "layout" => "qsite/_layouts/master.vue",
      "title" => "isite.cms.sidebar.adminOrganizationForm",
      "icon" => "fas fa-pen",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true,
        "breadcrumb" => [
          "isite_cms_admin_organizations"
        ]
      ]
    ],
    "categories" => [
      "permission" => "isite.categories.manage",
      "activated" => true,
      "path" => "/site/categories",
      "name" => "qsite.admin.catgeories.index",
      "crud" => "qsite/_crud/categories",
      "page" => "qcrud/_pages/admin/crudPage",
      "layout" => "qsite/_layouts/master.vue",
      "title" => "isite.cms.sidebar.adminCategories",
      "icon" => "fas fa-layer-group",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true
      ]
    ],
    "icruds" => [
      "permission" => "isite.icruds.manage",
      "activated" => true,
      "path" => "/site/icruds",
      "name" => "qsite.admin.icruds.index",
      "crud" => "qsite/_crud/icruds",
      "page" => "qcrud/_pages/admin/crudPage",
      "layout" => "qsite/_layouts/master.vue",
      "title" => "isite.cms.sidebar.adminIcruds",
      "icon" => "fas fa-code",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true
      ]
    ],
    "layouts" => [
      "permission" => "isite.layouts.manage",
      "activated" => true,
      "path" => "/site/layouts",
      "name" => "qsite.admin.layouts.index",
      "crud" => "qsite/_crud/layouts",
      "page" => "qcrud/_pages/admin/crudPage",
      "layout" => "qsite/_layouts/master.vue",
      "title" => "isite.cms.sidebar.adminLayouts",
      "icon" => "fas fa-layer-group",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true
      ]
    ],
  ],
  'panel' => [],
  'main' => [
    "home" => [
      "permission" => null,
      "activated" => true,
      "path" => "/",
      "name" => "app.home",
      "layout" => "qsite/_layouts/master.vue",
      "page" => "qsite/_pages/main/index.vue",
      "title" => "isite.cms.sidebar.pageHome",
      "icon" => "fas fa-home",
      "authenticated" => true,
      "subHeader" => [
        "refresh" => true
      ]
    ],
    "notAuthorized" => [
      "permission" => null,
      "activated" => true,
      "path" => "/not-authorized",
      "name" => "app.not.authorized",
      "layout" => "qsite/_layouts/blank",
      "page" => "qsite/_pages/master/notAuthorized",
      "title" => "isite.cms.sidebar.pageHome",
      "icon" => "fas fa-home",
      "authenticated" => true
    ],
    "testPage" => [
      "permission" => null,
      "activated" => true,
      "path" => "/test-page",
      "name" => "app.test.page",
      "layout" => "qsite/_layouts/master",
      "page" => "qsite/_pages/master/testPage",
      "title" => "isite.cms.sidebar.pageHome",
      "icon" => "fas fa-flask",
      "authenticated" => true
    ],
    "dynamicFieldsPage" => [
      "permission" => null,
      "activated" => true,
      "path" => "/dynamic-fields",
      "name" => "app.dynamic.fields.page",
      "layout" => "qsite/_layouts/master",
      "page" => "qsite/_pages/master/dynamicFieldPage",
      "title" => "isite.cms.sidebar.pageHome",
      "icon" => "fas fa-flask",
      "authenticated" => true
    ]
  ]
];

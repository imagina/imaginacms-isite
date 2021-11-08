<?php

return [
  'isite.settings' => [
    'manage' => 'isite::settings.manage',
    'index' => 'isite::settings.list resource',
    'edit' => 'isite::settings.edit resource',
    'create' => 'isite::settings.create resource',
    'assign' => 'isite::settings.assign resource',
  ],
  'isite.master.records' => [
    'manage' => 'isite::master.record.manage',
    'index' => 'isite::master.record.list resource',
    'edit' => 'isite::master.record.edit resource',
    'create' => 'isite::master.record.create resource',
    'destroy' => 'isite::master.record.destroy resource',
  ],
  'isite.recommendations' => [
    'manage' => 'isite::recommendations.manage',
    'index' => 'isite::recommendations.list resource',
    'edit' => 'isite::recommendations.edit resource',
    'create' => 'isite::recommendations.create resource',
    'destroy' => 'isite::recommendations.destroy resource',
  ],
  'isite.edit-link' => [
    'manage' => 'isite::edit-link.manage',
  ],
  'isite.organizations' => [
    'manageee' => 'isite::organizations.manage',
    'manage' => 'isite::organizations.manage',
    'index' => 'isite::organizations.list resource',
    'index-all' => 'isite::organizations.list resource',
    'edit' => 'isite::organizations.edit resource',
    'create' => 'isite::organizations.create resource',
  ],
  'isite.icruds' => [
    'manage' => 'isite::icruds.manage resource',
    'index' => 'isite::icruds.list resource',
    'create' => 'isite::icruds.create resource',
    'edit' => 'isite::icruds.edit resource',
    'destroy' => 'isite::icruds.destroy resource',
    'restore' => 'isite::icruds.restore resource',
  ],
    'isite.domains' => [
        'manage' => 'isite::domains.manage resource',
        'index' => 'isite::domains.list resource',
        'create' => 'isite::domains.create resource',
        'edit' => 'isite::domains.edit resource',
        'destroy' => 'isite::domains.destroy resource',
        'restore' => 'isite::domains.restore resource',
    ],
// append

];

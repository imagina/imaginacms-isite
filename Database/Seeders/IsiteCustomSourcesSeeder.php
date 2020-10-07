<?php

namespace Modules\Isite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class IsiteCustomSourcesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    $settings = app('Modules\Setting\Repositories\SettingRepository');

    //Search if already exist settings
    $existCustomeCss = $settings->findByName('isite::custom-css');
    $existCustomeJs = $settings->findByName('isite::custom-js');

    //Create or update settings
    if (!$existCustomeCss && !$existCustomeJs) {
      $settings->createOrUpdate([
        "isite::custom-css" => '',
        "isite::custom-js" => '',
      ]);
    }
  }
}

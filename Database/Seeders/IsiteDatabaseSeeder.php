<?php

namespace Modules\Isite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class IsiteDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $setting = app('Modules\Setting\Repositories\SettingRepository');
  
      $this->settings->createOrUpdate([
        "isite::logo1" => ["medias_single" => ["isite::logo1" => null]],
        "isite::logo2" => ["medias_single" => ["isite::logo2" => null]],
        "isite::logo3" => ["medias_single" => ["isite::logo3" => null]],
        "core::site-name" => 'App',
        "core::locales" => ['en']
      ]);
    }
}

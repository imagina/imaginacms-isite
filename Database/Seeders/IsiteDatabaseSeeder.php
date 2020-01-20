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
  
      $settings = app('Modules\Setting\Repositories\SettingRepository');
  
      $settings->createOrUpdate([
        "isite::logo1" => json_encode(["medias_single" => ["isite::logo1" => null]]),
        "isite::logo2" => json_encode(["medias_single" => ["isite::logo2" => null]]),
        "isite::logo3" => json_encode(["medias_single" => ["isite::logo3" => null]])
      ]);

      //Seed colors
      $this->call(IsiteColorsSeeder::class);
    }
}

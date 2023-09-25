<?php

namespace Modules\Isite\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class IsiteCustomSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $settings = app('Modules\Setting\Repositories\SettingRepository');

        $settingsToCreate = [
            'isite::customCss' => '',
            'isite::customJs' => '',
        ];

        foreach ($settingsToCreate as $key => $settingToCreate) {
            $setting = $settings->findByName($key);
            if (! isset($setting->id)) {
                $settings->createOrUpdate([$key => $settingToCreate]);
            }
        }
    }
}

<?php

namespace Modules\Isite\Database\Seeders;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MoveContactSettingsToSettingsTranslationsTableSeeder extends Seeder
{
  public function run()
  {
    $seedUniquesUse = DB::table('isite__seeds')->where('name', 'MoveContactSettingsToSettingsTranslationsTableSeeder')->first();
    if (empty($seedUniquesUse)) {
      $settings = DB::table('setting__settings')->whereIn('name', ['isite::addresses', 'isite::emails', 'isite::phones'])->get();
      $availableLocales = json_decode(setting('core::locales'));
      if (!empty($settings)) {
        foreach ($settings as $setting) {
          foreach ($availableLocales as $locale) {
            DB::table('setting__setting_translations')->updateOrInsert(
              [
                'setting_id' => $setting->id,
                'locale' => $locale,
              ],
              [
                'value' => $setting->plainValue,
              ]
            );
          }
          DB::table('setting__settings')->where('id', $setting->id)->update(['plainValue' => NULL, 'isTranslatable' => 1]);
        }
      }
      DB::table('isite__seeds')->insert(['name' => 'MoveContactSettingsToSettingsTranslationsTableSeeder']);
    }
  }
}
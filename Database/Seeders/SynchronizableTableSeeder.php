<?php

namespace Modules\Isite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Isite\Entities\Synchronizable;

class SynchronizableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();
      $modules = app('modules')->allEnabled();

      foreach ($modules as $module) {
        $lowercaseModule = strtolower($module->get('name'));
        $configData = config('asgard.' . $lowercaseModule . '.config.synchronizable');

        if(isset($configData) && $configData) {
          foreach ($configData["entities"] as $entity => $values) {
            $syncData = Synchronizable::where('name', $entity)->first();

            if(!isset($syncData->id)) {

              Synchronizable::create([
                'name' => $entity,
                'base_template_id' => $values["base_template_id"]
              ]);
            } else if($syncData->base_template_id !== $values["base_template_id"]) {

              $syncData->update([
                'base_template_id' => null
              ]);
            }
          }
        }
      }
    }
}

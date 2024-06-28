<?php

namespace Modules\Isite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Isite\Entities\WebhookEntity;

class WebhookEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->module = app('modules');
        $enabledModules = $this->module->allEnabled();

        foreach ($enabledModules as $module) {
            
            $entities = config("asgard." . $module->getAlias() . ".config.webhookEntities"); 
            if (!empty($entities)) {
                foreach($entities as $entity){
                    
                    $dbEntity= WebhookEntity::where("module_name", $module->getName())->where("name", $entity)->first();
                    if (empty($dbEntity)) {
                        
                        WebhookEntity::create([
                            "module_name" => $module->getName(),
                            "name" => $entity,
                        ]);
                    }
                }
            }

        }
    }
}

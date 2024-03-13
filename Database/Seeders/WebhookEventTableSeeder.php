<?php

namespace Modules\Isite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Isite\Entities\Event;
 
class WebhookEventTableSeeder extends Seeder
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
            $events = config("asgard." . $module->getAlias() . ".config.webhookEvents"); 
            if (!empty($events)) {
                foreach($events as $event){
                    $dbEvent= Event::where("module_name", $module->getName())->where("name", $event)->first();
                    if (empty($dbEvent)) {
                        Event::create([
                            "module_name" => $module->getName(),
                            "name" => $event,
                        ]);
                    }
                }
            }

        }
    }
}

<?php

namespace Modules\Isite\Services;

class MenuTenantService
{

    public function copyProcess(string $table, array $data)
    {
        
        //Dentro ya se tomaran en cuenta las otras tablas
        if($table=="menu__menuitems"){

            //row from database
            $rowIdBase = $data['id'];
           
            //Se busca por system name
            $existRegister = \DB::table($table)->select("id")
            ->where("system_name","=",$data['system_name'])
            ->get();
            
            //Not exist , so insert data
            if(count($existRegister)==0){
                
                //Process
                //\Log::info("Copying page with system_name: ".$data['system_name']);

                // El registro no existe, pero el ID de esa Pagina ya sta ocupado en el new tenant    
                unset($data['id']);

                //Insert and get Id
                $newId = \DB::table($table)->insertGetId($data);

                //Process to Copy Translations
                $this->copyTranslations($rowIdBase, $newId);

            }

        }

    }

    public function copyTranslations($rowIdBase,$newId)
    {

        $table = "menu__menuitem_translations";
        $attName = "menuitem_id";

        //Search infor in Database Layout
        $dataToCopy = \DB::connection("newConnectionTenant")
        ->select("SELECT * FROM ".$table." WHERE ".$attName." =".$rowIdBase);

        foreach ($dataToCopy as $data) {
            $data = (array)$data;
            // El registro no existe, pero el ID ya sta ocupado en el new tenant
            unset($data['id']);
            $data[$attName] = $newId;
            //Insert
            \DB::table($table)->insert($data);
        }

    }


   

}
<?php

namespace Modules\Isite\Services;

class PagesTenantService
{

    public function copyPagesProcess(string $table, array $data)
    {
        
        //Dentro ya se tomaran en cuenta las otras tablas
        if($table=="page__pages"){

            $pageIdLayoutBase = $data['id'];
           
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
                $newPageId = \DB::table($table)->insertGetId($data);

                //Process to Copy Translations
                $this->copyPagesTranslations($pageIdLayoutBase, $newPageId);

            }

        }

    }

    public function copyPagesTranslations($pageIdLayoutBase,$newPageId)
    {

        $table = "page__page_translations";
        $dataToCopy = \DB::connection("newConnectionTenant")->select("SELECT * FROM ".$table." WHERE page_id =".$pageIdLayoutBase);
        foreach ($dataToCopy as $data) {
            $data = (array)$data;
            // El registro no existe, pero el ID ya sta ocupado en el new tenant
            unset($data['id']);
            $data["page_id"] = $newPageId;
            //Insert
            \DB::table($table)->insert($data);
        }

    }


    /*
    * Metodo de Respaldo - 
    * Se utilizo en la primera version
    * Si no encontraba la pagina, se ejecutaba
    */
    public function validationPages(string $table, array $data)
    {

        if($table=="page__pages"){
            //Not include all pages
            if($data['type']!="cms"){
                //Update
                \DB::table($table)->where("id","=",$data['id'])->update([
                "system_name"=> $data["system_name"],
                "organization_id"=> $data["organization_id"]
                ]);
            }

        }

    }

}
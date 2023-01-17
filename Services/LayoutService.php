<?php

namespace Modules\Isite\Services;

use Modules\Isite\Repositories\LayoutRepository;
use Illuminate\Support\Str;

use Illuminate\Filesystem\Filesystem;

class LayoutService
{

    private $layout;
    private $finder;
    
    public function __construct(
        LayoutRepository $layout,
        Filesystem $finder
    ){
      $this->layout = $layout;
      $this->finder = $finder;
    }

    public function create(array $data,object $organization)
    {
        
        \Log::info("----------------------------------------------------------");
        \Log::info("Creating new layout...");
        \Log::info("----------------------------------------------------------");

        $systemName = Str::slug($data['title'], '-');

        //Proccess to create new layout
        $layoutCreated = $this->createLayoutInCentralDB($data,$systemName);
        $this->createFolderInTheme($systemName);
        $this->updateConfigFile($data,$systemName,$organization);

        //Update organization with new layout
        $organization->layout_id = $layoutCreated->id;
        $organization->save();

    }

    public function createLayoutInCentralDB(array $data, string $systemName)
    {
        \Log::info("Creating layout in Central Database...");

        $dataToCreate = [
            'system_name' => $systemName,
            'module_name' => 'Page',
            'entity_name' => 'Page',
            'entity_type' => 'Modules\Page\Entities\Page',
            'path' => 'pages.content.layouts.'.$systemName,
            'status' => $data['status'] ?? 1,
            'en' => [
                'title' => $data['title'] ?? null,
            ],
            'es' => [
                'title' => $data['title'] ?? null,
            ],
        ];

        $layoutCreated = $this->layout->create($dataToCreate); 

        return $layoutCreated;
    }

    public function createFolderInTheme(string $systemName)
    {
        \Log::info("Creating folder in Theme");

        $source = base_path('Modules/Isite/Resources/views/frontend/tenant/theme/base');
        $to = base_path('Themes/ImaginaTheme/views/pages/content/layouts/'.$systemName);  
        
        \Log::info("Copy - source: ".$source);
        \Log::info("Copy - to: ".$to);
    
        \File::copyDirectory($source, $to);

    }

    public function updateConfigFile(array $data, string $systemName, object $organization)
    {
        \Log::info("Updating config file: tenancy.php ");

        $pathFile = base_path('config/tenancy.php');

        $configContent = $this->finder->get($pathFile);

        $content = $this->getContentForStub($data, $systemName, $organization,base_path('Modules/Workshop/Scaffold/Module/stubs/config-layout-tenant.stub'));
        $configContent = str_replace('//append-config-layout', $content, $configContent);
       
        $this->finder->put($pathFile, $configContent);

    }

    protected function getContentForStub(array $data, string $systemName, object $organization, $pathStub)
    {
        $stub = $this->finder->get($pathStub);

        return str_replace(
            [
                '$SYSTEM_NAME$',
                '$ORGANIZATION_ID$',
                '$EMAIL$',
                '$PLAN$',
                '$TITLE$',
                '$PASSWORD$',
                '$URL$',
            ],
            [
                $systemName,
                $organization->id,
                $data['email'],
                $data['plan'],
                $data['title'],
                $data['password'],
                $organization->domain
            ],
            $stub
        );
       

    }

}
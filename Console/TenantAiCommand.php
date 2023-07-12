<?php


namespace Modules\Isite\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class TenantAiCommand extends Command
{
    
  protected $signature = 'tenant:ai:run {tenantId}';
  protected $description = 'Run AI Service to tenant';


  public function handle()
  {
        
    $tenantId = $this->argument('tenantId');
  
    $this->info("Ai Service| START");
    app("Modules\Isite\Services\TenantAiService")->processAi($tenantId);
    $this->info("Ai Service| COMPLETED");

  }


}
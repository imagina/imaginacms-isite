<?php

namespace Modules\Isite\Jobs;

use Illuminate\Support\Collection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PDFExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $params;

    private $exportParams;

    private $items;

    private $disk;

    private $inotification;

    private $pdfService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($params, $exportParams, $disk)
    {
        $this->params = $params;
        $this->disk = $disk;
        $this->exportParams = $exportParams;
        $this->inotification = app('Modules\Notification\Services\Inotification');
        $this->pdfService = app('Modules\Isite\Services\PdfService');
    }

    public function query(): Collection
    {
        //Init Repo
        $repository = app("Modules\\{$this->exportParams->moduleName}\\Repositories\\{$this->exportParams->repositoryName}");
        //Set fields and extra params
        $this->params->fields = $this->exportParams->fields ?? [];
        //Get query
        $this->items = $repository->getItemsBy($this->params);
        //Response
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->query();

        //converting to Array to make possible the array_merge with the another data
        $this->exportParams = json_decode(json_encode($this->exportParams), true);

        $data = [
            'fileName' => $this->exportParams['fileName'].'-'.$this->params->user->id,
            'disk' => $this->disk,
            'items' => $this->items,
        ];

        //removing the fileName because it's already in the $data
        unset($this->exportParams['fileName']);

        //sending the $data and de exportParams in one array merged
        $this->pdfService->create(array_merge($data, $this->exportParams));
        \Log::info('post PDFExport');
        //Send pusher notification
        $this->inotification->to(['broadcast' => $this->params->user->id])->push([
            'title' => 'New PDF',
            'message' => 'Your pdf is ready!',
            'link' => url(''),
            'isAction' => true,
            'frontEvent' => [
                'name' => 'isite.export.ready',
                'data' => $this->exportParams,
            ],
            'setting' => ['saveInDatabase' => 1],
        ]);
    }
}

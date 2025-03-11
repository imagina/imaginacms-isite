<?php

namespace Modules\Isite\Traits;

use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

use Modules\Isite\Entities\ReportQueue;
use Illuminate\Support\Facades\Cache;

trait ReportQueueTrait
{
  public $userId;
  public $internalTraitLog = "ReportQueueTrait::";
  protected $cacheKey = 'isite.reportqueues';

  public function lockReport($reportName)
  {
    //Validate user session
    if (!$this->userId) return \Log::info("{$this->internalTraitLog} NO lockReport, missing userId");
    //Handle the report queue
    ReportQueue::updateOrCreate(
      ['report' => $reportName, 'user_id' => $this->userId],
      ['start_date' => now()]
    );
    // Clear the repository cache
    $this->clearReportQueueCache();
    //Log
    \Log::info("{$this->internalTraitLog}lockReport|Report:{$reportName}|User:{$this->userId}");
  }

  public function unlockReport($reportName)
  {
    //Validate user session
    if (!$this->userId) return \Log::info("{$this->internalTraitLog} NO unlockReport, missing userId");
    //Handle the report queue
    ReportQueue::updateOrCreate(
      ['report' => $reportName, 'user_id' => $this->userId],
      ['start_date' => null]
    );
    // Clear the repository cache
    $this->clearReportQueueCache();
    //Log
    \Log::info("{$this->internalTraitLog}unlockReport|Report:{$reportName}|User:{$this->userId}");
  }

  protected function clearReportQueueCache()
  {
    // Clear all cached entries related to 'isite.reportqueues'
    Cache::tags([$this->cacheKey])->flush();
  }
}

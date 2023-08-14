<?php

namespace Modules\Isite\Traits;

use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

use Modules\Isite\Entities\ReportQueue;

trait ReportQueueTrait
{
  public $internalTraitLog = "ReportQueueTrait::";

  public function lockReport($reportName)
  {
    //Validate user session
    $user = \Auth::user();
    if (!$user) return \Log::info("{$this->internalTraitLog} NO lockReport, missing session");
    //Handle the report queue
    ReportQueue::updateOrCreate(
      ['report' => $reportName, 'user_id' => $user->id],
      ['start_date' => now()]
    );
    //Log
    \Log::info("{$this->internalTraitLog}lockReport|Report:{$reportName}|User:{$user->id}");
  }

  public function unlockReport($reportName)
  {
    //Validate user session
    $user = \Auth::user();
    if (!$user) return \Log::info("{$this->internalTraitLog} NO unlockReport, missing session");
    //Handle the report queue
    ReportQueue::updateOrCreate(
      ['report' => $reportName, 'user_id' => $user->id],
      ['start_date' => null]
    );
    //Log
    \Log::info("{$this->internalTraitLog}unlockReport|Report:{$reportName}|User:{$user->id}");
  }
}

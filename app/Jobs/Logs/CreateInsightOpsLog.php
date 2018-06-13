<?php

namespace App\Jobs\Logs;

use App\Utils\Log\InsightOps;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class CreateInsightOpsLog
 * @package App\Jobs\Logs
 */
class CreateInsightOpsLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    protected $message;
    protected $insightOps;

    /**
     * CreateInsightOpsLog constructor.
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $insightOps = new InsightOps();
        $insightOps->prepare($this->message)->send();
    }
}

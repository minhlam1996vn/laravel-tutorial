<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AddSystemLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Số lần job sẽ thử thực hiện lại.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * Số giây job có thể chạy trước khi timeout
     *
     * @var int
     */
    public $timeout = 60;

    /**
     * Data log
     *
     * @var string
     */
    public $dataLog;

    /**
     * Create a new job instance.
     */
    public function __construct($dataLog)
    {
        $this->dataLog = $dataLog;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('==================');
        Log::info($this->dataLog);
        Log::info('==================');
    }
}

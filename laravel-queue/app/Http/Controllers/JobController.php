<?php

namespace App\Http\Controllers;

use App\Jobs\AddSystemLogJob;
use Carbon\Carbon;

class JobController extends Controller
{
    public function job()
    {
        return view('job');
    }

    public function addJobLog()
    {
        $dataLog = 'Đây là log được thêm bởi job vào thời gian: ' . Carbon::now()->format('Y-m-d H:i:s');

        // $job = (new AddSystemLogJob($dataLog));
        $job = (new AddSystemLogJob($dataLog))->delay(Carbon::now()->addSeconds(5));
        dispatch($job);

        return redirect()->back()->with('msg', 'Thêm job thành công');
    }
}

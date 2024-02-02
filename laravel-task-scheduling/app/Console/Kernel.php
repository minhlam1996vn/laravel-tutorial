<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('inspire')->everyMinute()->appendOutputTo('danh_ngon.txt');

        // Closure
        $schedule->call(function () {
            $user = new User();
            $user->name = 'User' . Str::uuid();
            $user->email = 'user' . Str::uuid() . '@example.com';
            $user->password = Hash::make('12345678');
            $user->save();
        })->everyMinute();

        // Exec: Chạy những câu lệnh của hệ thống
        $schedule->exec('ls -la')->appendOutputTo('info_file.txt')->everyMinute();

        // Job: Hỗ trợ chạy job
        // $schedule->job(new Heartbeat)->everyFiveMinutes();

        // Command
        $schedule->command('app:user-command')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = new User();
        $user->name = 'Admin' . Str::uuid();
        $user->email = 'admin' . Str::uuid() . '@example.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $this->info('User created: ' . $user->id);
    }
}

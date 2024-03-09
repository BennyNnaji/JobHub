<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UpdateAdminPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:update-admin-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $admin->password = Hash::make('11111'); // Set a new password here
            $admin->save();
        }

        $this->info('Admin passwords updated successfully.');
    }
}

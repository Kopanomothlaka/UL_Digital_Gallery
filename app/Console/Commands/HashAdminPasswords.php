<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class HashAdminPasswords extends Command
{
    protected $signature = 'admin:hash-passwords';
    protected $description = 'Hash passwords for all admin users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $admin->password = Hash::make($admin->password);
            $admin->save();
        }

        $this->info('All admin passwords have been hashed successfully!');
    }
}

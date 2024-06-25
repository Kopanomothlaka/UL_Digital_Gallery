<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get all admins from the admins table
        $admins = DB::table('admins')->get();

        // Update each admin's password with hashed version
        foreach ($admins as $admin) {
            $hashedPassword = Hash::make($admin->password);
            DB::table('admins')
                ->where('id', $admin->id)
                ->update(['password' => $hashedPassword]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

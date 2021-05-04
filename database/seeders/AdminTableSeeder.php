<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'created_at' => now()
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

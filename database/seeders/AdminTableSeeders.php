<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            [
                'user_id' => 1,
                'isSuperAdmin' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

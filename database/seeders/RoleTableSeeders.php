<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([

            [
                'name' => 'admin',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now()
            ],


            [
                'name' => 'commercial',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'manager',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'user',
                'guard_name' => 'api',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

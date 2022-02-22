<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbonnementTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abonnements')->insert([
            [
                'nom' => 'free',
                'prix' => 0,
                'duree' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

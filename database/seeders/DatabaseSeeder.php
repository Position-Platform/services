<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeders::class);
        $this->call(UserTableSeeders::class);
        $this->call(AdminTableSeeders::class);
        $this->call(AbonnementTableSeeders::class);
        $this->call(CategorieTableSeeders::class);
        $this->call(SousCategorieTableSeeders::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@position.cm',
                'phone' => '699999999',
                'password' => Hash::make('secret'),
                'email_verified_at' => now(),
                'fcmToken' => null,
                'imageProfil' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $user = User::find(1);

        $user->assignRole('admin');
    }
}

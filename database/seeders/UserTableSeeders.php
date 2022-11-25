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
                'fcm_token' => null,
                'image_profil' => 'https://www.gravatar.com/avatar/cc7f85717aae3a03e26cbd2a076e0a3d?s=200&d=mm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $user = User::find(1);

        $user->assignRole('admin');
    }
}

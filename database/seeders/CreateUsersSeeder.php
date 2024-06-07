<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'is_admin' => '1',
                'password' => bcrypt('spasi3xenter'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'is_admin' => '2',
                'password' => bcrypt('spasi3xenter'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

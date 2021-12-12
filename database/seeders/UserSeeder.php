<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ],
            [
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ]
        ];
        foreach ($users as $user) {
            if(!\App\User::where('email', $user['email'])->update($user))
                \App\User::create($user);
        }
    }
    }
}

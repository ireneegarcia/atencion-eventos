<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
                'name' => 'hector',
                'email' => 'hector@gmail.com',
                'password' => Hash::make('123456789')
            ]
        ];

        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}

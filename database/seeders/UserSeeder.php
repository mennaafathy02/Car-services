<?php

namespace Database\Seeders;

use App\Models\User;
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
        $type = [
            'customer',
            'machine',
        ];

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'phone' => '010' . $i . '010' . $i . '010' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'name' => 'user' . $i,
                "type" => $type[rand(0, 1)],
                'password' => 'password' . $i,

            ]);

        }
        User::create([
            'phone' => '46546576465',
            'email' => 'admin@admin.com',
            'name' => 'super-admin',
            "type" => \App\Enums\UserType::admin,
            'password' => '123456789',
        ]);


    }
}

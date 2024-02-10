<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                "password" => "123456789",
            ],

        ];
        foreach ($data as $item) {
            \App\Models\Admin::create($item);
        }
    }
}

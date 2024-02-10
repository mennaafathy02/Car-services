<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 60; $i++) {
            $service = \App\Models\Service::create([
                'title' => 'Service ' . $i,
                'description' => 'Description ' . $i,
                'user_id' => rand(1, 20),
            ]);
            $service->addMedia(public_path('images/test.png'))->toMediaCollection('media');
            \Illuminate\Support\Facades\File::copy(public_path('images/test2.png'), public_path('images/test.png'));

        }
    }
}

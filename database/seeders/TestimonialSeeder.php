<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            \App\Models\Testimonial::create([
                'description' => [
                    'en' => 'This is a test description',
                    'ar' => 'هذا هو تجربة وصف',
                ],
            ]);

        }
    }
}

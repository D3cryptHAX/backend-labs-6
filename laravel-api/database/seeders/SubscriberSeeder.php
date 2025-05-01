<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscriber;

class SubscriberSeeder extends Seeder
{
    public function run()
    {
        Subscriber::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ]);

        Subscriber::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
        ]);

        \App\Models\Subscriber::factory(10)->create();
    }
}

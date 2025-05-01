<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        Subscription::create([
            'service' => 'Service 1',
            'topic' => 'Topic 1',
        ]);

        Subscription::create([
            'service' => 'Service 2',
            'topic' => 'Topic 2',
        ]);

        \App\Models\Subscription::factory(5)->create(); 
    }
}

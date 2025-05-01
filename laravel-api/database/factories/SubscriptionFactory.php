<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition()
    {
        // Отримуємо існуючого підписника для зв'язку
        $subscriber = Subscriber::inRandomOrder()->first();

        return [
            'service' => $this->faker->word,
            'topic' => $this->faker->word,
            'payload' => json_encode([
                'data' => $this->faker->word,
                'extra' => $this->faker->word
            ]),
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 year'),
            'subscriber_id' => $subscriber ? $subscriber->id : \App\Models\Subscriber::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    protected $model = Subscriber::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,  // Генеруємо унікальний email
            'name' => $this->faker->name,                  // Генеруємо випадкове ім'я
            // Додайте інші поля, якщо потрібно
        ];
    }
}


<?php

namespace App\Services;

use App\Models\Subscriber;

class SubscriberService
{
    // Метод для створення підписника
    public function createSubscriber($data)
    {
        return Subscriber::create($data);
    }

    // Метод для отримання всіх підписників з пагінацією
    public function getAllSubscribers($perPage = 15)
    {
        return Subscriber::paginate($perPage);
    }

    // Метод для отримання конкретного підписника по ID
    public function getSubscriberById($subscriberId)
    {
        return Subscriber::findOrFail($subscriberId);
    }

    // Метод для оновлення даних підписника
    public function updateSubscriber($subscriberId, $data)
    {
        $subscriber = Subscriber::findOrFail($subscriberId);
        $subscriber->update($data);
        return $subscriber;
    }

    // Метод для видалення підписника
    public function deleteSubscriber($subscriberId)
    {
        $subscriber = Subscriber::findOrFail($subscriberId);
        $subscriber->delete();
        return true;
    }
}

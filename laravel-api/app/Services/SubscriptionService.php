<?php

namespace App\Services;

use App\Models\Subscription;

class SubscriptionService
{
    public function createSubscription($data)
    {
        return Subscription::create($data);
    }

    public function getAllSubscriptions($perPage = 15)
    {
        return Subscription::paginate($perPage);
    }

    public function updateSubscription($subscriptionId, $data)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        $subscription->update($data);
        return $subscription;
    }

    public function deleteSubscription($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        $subscription->delete();
        return true;
    }
}

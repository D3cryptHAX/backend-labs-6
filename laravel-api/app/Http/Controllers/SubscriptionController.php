<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
    // Отримати всі підписки
    public function index(Request $request)
    {
        $subscriptions = Subscription::paginate(10); // Пагінація
        return response()->json($subscriptions);
    }

    // Створити нову підписку
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subscriber_id' => 'required|exists:subscribers,id',
            'service' => 'required|string',
            'topic' => 'required|string',
            'payload' => 'nullable|array',
            'expired_at' => 'nullable|date',
        ]);

        $subscription = Subscription::create($validated);
        return response()->json($subscription, Response::HTTP_CREATED);
    }

    // Отримати конкретну підписку
    public function show($id)
    {
        $subscription = Subscription::find($id);
        if (!$subscription) {
            return response()->json(['error' => 'Subscription not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($subscription);
    }

    // Оновити підписку
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'service' => 'required|string',
            'topic' => 'required|string',
            'payload' => 'nullable|array',
            'expired_at' => 'nullable|date',
        ]);

        $subscription = Subscription::find($id);
        if (!$subscription) {
            return response()->json(['error' => 'Subscription not found'], Response::HTTP_NOT_FOUND);
        }

        $subscription->update($validated);
        return response()->json($subscription);
    }

    // Видалити підписку
    public function destroy($id)
    {
        $subscription = Subscription::find($id);
        if (!$subscription) {
            return response()->json(['error' => 'Subscription not found'], Response::HTTP_NOT_FOUND);
        }

        $subscription->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

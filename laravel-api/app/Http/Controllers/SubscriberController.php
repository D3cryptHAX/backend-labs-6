<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriberController extends Controller
{
    // Отримати всіх підписників
    public function index(Request $request)
    {
        $subscribers = Subscriber::paginate(10); // Пагінація
        return response()->json($subscribers);
    }

    // Створити нового підписника
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
            'name' => 'required|string',
        ]);

        $subscriber = Subscriber::create($validated);
        return response()->json($subscriber, Response::HTTP_CREATED);
    }

    // Отримати конкретного підписника
    public function show($id)
    {
        $subscriber = Subscriber::find($id);
        if (!$subscriber) {
            return response()->json(['error' => 'Subscriber not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($subscriber);
    }

    // Оновити підписника
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
        ]);

        $subscriber = Subscriber::find($id);
        if (!$subscriber) {
            return response()->json(['error' => 'Subscriber not found'], Response::HTTP_NOT_FOUND);
        }

        $subscriber->update($validated);
        return response()->json($subscriber);
    }

    // Видалити підписника
    public function destroy($id)
    {
        $subscriber = Subscriber::find($id);
        if (!$subscriber) {
            return response()->json(['error' => 'Subscriber not found'], Response::HTTP_NOT_FOUND);
        }

        $subscriber->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

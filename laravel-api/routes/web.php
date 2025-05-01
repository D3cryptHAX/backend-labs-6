<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;

Route::prefix('api')->group(function () {

    Route::get('/subscribers', [SubscriberController::class, 'index']);

    Route::post('/subscribers', [SubscriberController::class, 'store']);

    Route::get('/subscriptions', [SubscriptionController::class, 'index']);

    Route::post('/subscriptions', [SubscriptionController::class, 'store']);
});

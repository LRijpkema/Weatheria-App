<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Integrations\ForgeConnector;
use App\Http\Requests\GetServerRequest;

Route::get('/', function () {
    $forge = new ForgeConnector;
    $request = new GetServerRequest;

    $response = $forge->send($request);

    $status = $response->status();
    $body = $response->json();


    $adjustedTimestamp = $body['dt'] + $body['timezone'];

// Create a DateTime object using the adjusted timestamp
    $localTimeDate = new DateTime("@$adjustedTimestamp");

// Format the time and date
    $formattedTime = $localTimeDate->format('H:i A');
    $formattedDate = $localTimeDate->format('l, j F Y');



    if ($status === 200) {
        $weather = [
            'name' => $body['name'],
            'country' => $body['sys']['country'],
            'temp' => $body['main']['temp'] -273.15,
            'temp_min' => $body['main']['temp_min'] -273.15,
            'temp_max' => $body['main']['temp_max'] -273.15,
            'icon' => $body['weather'][0]['icon'],
            'description' => $body['weather'][0]['description'],
            'date' => $formattedDate,
            'time' => $formattedTime,
        ];

        return Inertia::render('Welcome', ['weather' => $weather]);
    } else {
        // Handle the error scenario
        return Inertia::render('Dashboard');
    }
})->name('welcome');;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

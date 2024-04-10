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

    if ($localTimeDate->format('H') >= 6 && $localTimeDate->format('H') < 19) {
        $timeOfDay = 'day';
    } else {
        $timeOfDay = 'night';
    }

   $weatherId = $body['weather'][0]['id'];



    if (in_array($weatherId, [500, 501, 502, 503, 504, 511, 520, 521, 522, 531, 300, 301, 302, 310, 311, 312, 313, 314, 321, 200, 201, 202, 210, 211, 212, 221, 230, 231, 232])) {
        $weatherImage = 'rain.jpg';
    } elseif (in_array($weatherId, [600, 601, 602, 611, 612, 613, 615, 616, 620, 621, 622])) {
        $weatherImage = 'snow.jpg';
    } elseif (in_array($weatherId, [701, 711, 721, 731, 741, 751, 761, 762, 771, 781])) {
        $weatherImage = 'atmosphere.jpg';
    } elseif ($weatherId == 800) {
        $weatherImage = 'clear.jpg';
    } elseif (in_array($weatherId, [801, 802])) {
        $weatherImage = 'few-clouds.jpg';
    } elseif (in_array($weatherId, [803, 804])) {
        $weatherImage = 'cloudy.jpg';
    } else {
        $weatherImage = 'few-clouds.jpg';
    }


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
            'time_of_day' => $timeOfDay,
            'image' => $weatherImage,
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

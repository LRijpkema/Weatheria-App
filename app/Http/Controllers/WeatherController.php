<?php
//
//namespace App\Http\Controllers;
//
//use App\Http\Integrations\ForgeConnector;
//use App\Http\Requests\GetServerRequest;
//
//class WeatherController extends Controller
//{
//    public function index()
//    {
//        $forge = new ForgeConnector();
//        $request = new GetServerRequest();
//
//        $response = $forge->send($request);
//
//        $status = $response->status();
//        $body = $response->json();
//
//        dump($status);
//
//        if ($status === 200) {
//            $weather = [
//                'name' => $body['name'],
//                'temperature' => $body['main']['temp'],
//                'description' => $body['weather'][0]['description'],
//                'date' => $body['dt'],
//            ];
//
//            dump($weather);
//            return view('Welcome', compact('weather'));
//
//        } else {
//            // Handle the error scenario
//            return view('error');
//        }
//    }
//}

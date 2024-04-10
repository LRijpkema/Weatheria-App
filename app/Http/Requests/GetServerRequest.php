<?php

namespace App\Http\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\HasTimeout;

class GetServerRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        // Assuming you want to fetch weather data from a specific source
        // You can adjust this according to your needs
        return '/weather';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    protected function defaultQuery(): array
    {
        // Default query parameters for fetching weather data
        return [
            'fields' => 'main,weather,name,timezone', // Requested fields: main, weather, name, timezone
        ];
    }

    use HasTimeout;

    protected int $connectTimeout = 60;

    protected int $requestTimeout = 120;

}

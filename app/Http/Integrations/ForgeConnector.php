<?php
namespace App\Http\Integrations;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\HasTimeout;

class ForgeConnector extends Connector
{
    /**
     * @param int|null $cityId
     * @return string
     */
    public function resolveBaseUrl(?int $cityId = null): string
    {
        $apiKey = 'd9f44a22255c2a5287b7824d4d8e2795';

        if ($cityId === null) {
            $cityId = '2759794'; //Amsterdam

//            $cityId = '5128581';   //New York

//            $cityId = '2147714';  //Sydney

        }

        return 'https://api.openweathermap.org/data/2.5/weather?id=' . $cityId . '&appid=' .$apiKey. '&units=metric';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    use HasTimeout;

    protected int $connectTimeout = 60;

    protected int $requestTimeout = 120;
}

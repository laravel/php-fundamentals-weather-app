<?php

namespace WeatherApp;

use GuzzleHttp\Client;

class WeatherService
{
    private string $apiKey = '7246de415ccc5d4ff9c4fbb2852575d6';
    private string $apiEndpoint = 'https://api.openweathermap.org/data/2.5/weather';
    private Client $client;

    public function __construct() {
        $this->client = new Client();
    }

    public function getWeather(string $city): array
    {
        $response = $this->client->get($this->apiEndpoint, [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return [
            'city' => $data['name'],
            'temperature' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'humidity' => $data['main']['humidity']
        ];
    }
}
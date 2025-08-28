#!/usr/bin/env php
<?php

use WeatherApp\WeatherService;

require_once __DIR__ . '/vendor/autoload.php';

if ($argc < 2) {
    echo "Usage: php weather.php <city>\n";
    echo "Example: php weather.php London\n";
    exit(1);
}

$weatherService = new WeatherService();
$city = $argv[1];

echo "Getting weather for $city...\n";
$weather = $weatherService->getWeather($city);

echo "\n";
echo "City: " . $weather['city'] . "\n";
echo "Temperature: " . $weather['temperature'] . "°C\n";
echo "Description: " . $weather['description'] . "\n";
echo "Humidity: " . $weather['humidity'] . "%\n";
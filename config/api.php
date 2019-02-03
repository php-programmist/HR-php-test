<?php
return [
    'key' => env('YANDEX_API_KEY'),
    'lat' => env('YANDEX_API_LAT'),
    'lon' => env('YANDEX_API_LON'),
    'lang' => env('YANDEX_API_LANG','ru_RU'),
    'limit' => env('YANDEX_API_LIMIT',1),
    'cache' => env('YANDEX_API_CACHE',0),
];
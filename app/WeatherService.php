<?php

namespace App;

class WeatherService
{
    public static function getWeather()
    {
        $key             = config('api.key');
        $url             = 'https://api.weather.yandex.ru/v1/forecast';
        $params          = [];
        $params['lat']   = config('api.lat');
        $params['lon']   = config('api.lon');
        $params['lang']  = config('api.lang');
        $params['limit'] = config('api.limit');
        
        $response = \Cache::remember('weather', config('api.cache', 0), function () use ($url, $key, $params) {
            try{
                return self::sendRequest($url, $key, $params);
            } catch
            (\Exception $e){
                session()->flash('error', $e->getMessage());
                
                return false;
            }
        });
        
        $data = json_decode($response);
        
        return $data->fact->temp;
    }
    
    protected static function sendRequest($url, $key, $params)
    {
        $url .= '?' . http_build_query($params);
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Yandex-API-Key: ' . $key,
        ));
        $file_data     = curl_exec($ch);
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error         = curl_error($ch);
        curl_close($ch);
        
        if ($file_data && $response_code == 200) {
            return $file_data;
        } else {
            throw new \Exception("Error: $error. Code: $response_code");
        }
    }
}
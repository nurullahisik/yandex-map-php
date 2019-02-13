<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 13.02.2019
 * Time: 16:00
 */

require "Curl.php";

class Yandex
{
    private $domain_url = "https://geocode-maps.yandex.ru/1.x/";
    private $api_key;

    public function __construct()
    {
        $config = require "config.php";
        $this->api_key = $config['api_key'];
    }

    public function geocoder($address = ""){
        $url = $this->domain_url . "?apikey=" . $this->api_key . "&geocode=$address&lang=tr_TR";

        $curl   = new Curl();
        $output = $curl->get($url);

        $output = simplexml_load_string($output);

        $pos = $output->GeoObjectCollection->featureMember->GeoObject->Point->pos;

        $pos = explode(" ", $pos);

        return [
            'latitude'  => $pos[1],
            'longitude' => $pos[0]
        ];
    }

    public function staticMap($longitude = "", $latitude = "", $file_name = "")
    {
        if ( empty($file_name) ) {
            $file_name = rand() . ".jpg";
        }

        $url = "https://static-maps.yandex.ru/1.x/?lang=tr_TR&l=map&pt=$longitude,$latitude,pm2bll";

        $curl   = new Curl();
        $output = $curl->get($url);
        $result = @simplexml_load_string($output);

        if ( isset($result->status) && $result->status == 400 ) {
            return [
                'error' => $result->message
            ];
        } else{
            $file = fopen($file_name, "w+");
            $result = fwrite($file, $output);
            fclose($file);

            if ( $result ) {
                return [
                    'file' => $file_name
                ];
            }else{
                return [
                    'error' => "File saving error!"
                ];
            }

        }

    }

}
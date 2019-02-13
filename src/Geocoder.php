<?php
/**
 * Created by PhpStorm.
 * User: NURULLAH ISIK
 * Date: 13.02.2019
 * Time: 17:18
 */

namespace Yandex;

use Yandex\Yandex;

class Geocoder extends Yandex
{

    public function get($address = ""){
        $url = $this->domain_url . "?apikey=" . $this->api_key . "&geocode=$address&lang=tr_TR";

        $output = $this->curl->get($url);

        $output = simplexml_load_string($output);

        $pos = $output->GeoObjectCollection->featureMember->GeoObject->Point->pos;

        $pos = explode(" ", $pos);

        return [
            'latitude'  => $pos[1],
            'longitude' => $pos[0]
        ];
    }
}
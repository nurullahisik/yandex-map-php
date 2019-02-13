<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 13.02.2019
 * Time: 16:20
 */

include "vendor/autoload.php";


//use Yandex\Geocoder;
//$yandex_geocoder = new Geocoder();
//$geocoder = $yandex_geocoder->get("Ankara, Türkiye");

//print_r($geocoder);die;

use Yandex\StaticMap;
$static_map = new StaticMap();

$data = $static_map->get("32.854049", "39.920756");

print_r($data);

<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 13.02.2019
 * Time: 16:20
 */


include "src/Yandex.php";

$yandex = new Yandex();

$geocoder = $yandex->geocoder("Ankara, Türkiye");

//print_r($geocoder);

$data = $yandex->staticMap($geocoder['longitude'], $geocoder['latitude']);

print_r($data);

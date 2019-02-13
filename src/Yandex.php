<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 13.02.2019
 * Time: 16:00
 */

namespace Yandex;

use Yandex\Curl;

class Yandex
{
    public $domain_url = "https://geocode-maps.yandex.ru/1.x/";
    public $api_key;
    public $curl;

    public function __construct()
    {
        $config = require "config.php";
        $this->api_key = $config['api_key'];
        $this->curl    = new Curl();
    }

}
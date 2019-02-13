<?php
/**
 * Created by PhpStorm.
 * User: Nurullah ISIK
 * Date: 13.02.2019
 * Time: 16:08
 */

class Curl
{
    public function get($url = "")
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    public function post($url = "", $data = [])
    {

        return true;
    }

}
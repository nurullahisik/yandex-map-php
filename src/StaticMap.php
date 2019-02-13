<?php
/**
 * Created by PhpStorm.
 * User: NURULLAH ISIK
 * Date: 13.02.2019
 * Time: 17:20
 */

namespace Yandex;

use Yandex\Yandex;

class StaticMap extends Yandex
{
    public function get($longitude = "", $latitude = "", $file_name = "")
    {
        if ( empty($file_name) ) {
            $file_name = rand() . ".jpg";
        }

        $url = "https://static-maps.yandex.ru/1.x/?lang=tr_TR&l=map&pt=$longitude,$latitude,pm2bll";

        $output = $this->curl->get($url);
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
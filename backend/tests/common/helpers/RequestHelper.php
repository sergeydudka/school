<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.11.2018
 * Time: 20:39
 */

namespace backend\tests\common\helpers;

use backend\tests\common\ApiRequestAdapter;
use function GuzzleHttp\Psr7\mimetype_from_extension;
use yii\web\Response;

class RequestHelper {

    public static function getNewRequest() {
        return new ApiRequestAdapter(
            [
                'base_uri' => 'http://learn.local/',
                'cookies' => true,
                'headers' => [
                    'Accept' => mimetype_from_extension(Response::FORMAT_JSON)
                ]
            ]
        );
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.11.2018
 * Time: 21:42
 */

namespace backend\tests\common\actions;

use backend\tests\common\ActionTester;
use backend\tests\common\helpers\RequestHelper;

class IndexActionTester extends ActionTester {
    private $url;
    private $method;

    public function run() {
        $request = RequestHelper::getNewRequest();

        $response = $request->getJsonResponse($this->url, $this->method, false);

        $this->assertResponse($response);
    }
}
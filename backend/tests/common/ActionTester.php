<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.11.2018
 * Time: 21:46
 */

namespace backend\tests\common;


use PHPUnit\Framework\Assert;

class ActionTester {
    protected $url;
    protected $method;

    public function __construct($params) {
        $this->url = $params['url'];
        $this->method = is_array($params['method']) ? array_shift($params['method']) : 'GET';
    }

    protected function assertResponse($response) {
        Assert::assertTrue((bool)$response['status'], 'Check status.');
        Assert::assertTrue((int)$response['statusCode'] === 200, 'Check status code (200).');
        Assert::assertTrue(!$response['errors'], 'Check has errors.');
        Assert::assertTrue(is_array($response['result']) && !empty($response['result']), 'Check result fields.');
        Assert::assertTrue(is_array($response['fields']) && !empty($response['fields']), 'Check model fields.');
    }
}
<?php

namespace backend\tests\unit;

use backend\tests\common\PHPUnitTestCase;
use function GuzzleHttp\Psr7\mimetype_from_extension;
use yii\web\Response;

/**
 * Class responseTypeTest
 */
class ResponseTypeTest extends PHPUnitTestCase {
    
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testResponseHTMLType() {
        $response = $this->request
            ->setConfig('headers', ['Accept' => mimetype_from_extension(Response::FORMAT_HTML)])
            ->getResponse('/main/menu/');
        $contentType = $response->getHeaderLine('Content-Type');
        $this->assertContains(mimetype_from_extension(Response::FORMAT_HTML), $contentType);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testResponseJsonType() {
        $response = $this->request->getResponse('/main/menu/');
        $json = $response->getBody()->getContents();
        $this->assertJson($json);
    }
}

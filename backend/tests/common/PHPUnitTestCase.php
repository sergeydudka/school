<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 17.11.2018
 * Time: 14:56
 */

namespace backend\tests\common;

use backend\tests\common\helpers\RequestHelper;


class PHPUnitTestCase extends \PHPUnit\Framework\TestCase {

    public $appConfig;
    public $appParams;
    public $appComponents;

    protected static $httpConfig;
    /* @var ApiRequestAdapter*/
    protected $request;

    private static $menu;
    /**
     * PHPUnitTestCase constructor.
     * @param null|string $name
     * @param array       $data
     * @param string      $dataName
     */
    public function __construct(?string $name = null, array $data = [], string $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $this->appConfig = $GLOBALS['config'];
        $this->appParams = $this->appConfig['params'];
        $this->appParams = $this->appConfig['components'];
    }


    /**
     * Starts before each test
     */
    protected function setUp() {
        $this->createNewRequest();
    }

    protected function createNewRequest() {
        $this->request = RequestHelper::getNewRequest();
        return $this->request;
    }

    /**
     * @return array|bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMenu() {
        if (self::$menu === null) {
            self::$menu = $this->request->getJsonResponse('/main/menu/');
        }
        return self::$menu;
    }
}
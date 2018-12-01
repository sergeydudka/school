<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 25.11.2018
 * Time: 17:43
 */

namespace backend\tests\unit\entity;

use backend\tests\common\ModelTestInterface;
use backend\tests\common\PHPUnitTestCase;

class AliasModuleTest extends PHPUnitTestCase implements ModelTestInterface {

    protected function setUp() {
        parent::setUp();

        $this->request->userLogin();
    }

    public function testCrud() {
        $menu = $this->getMenu();
        $module = $menu['result']['list']['alias'] ?? false;
        $this->assertTrue((bool)$module);
    }


    public function getModuleName() {
        // TODO: Implement getModuleName() method.
    }

    public function getDataPath() {
        // TODO: Implement getDataPath() method.
    }
}
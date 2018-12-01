<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.11.2018
 * Time: 16:18
 */

namespace backend\tests\unit;

use backend\tests\common\PHPUnitTestCase;

class GuestAccessTest extends PHPUnitTestCase {

    protected function setUp() {
        parent::setUp();

        $this->request->userLogout();
    }

    public function testModulesAccess() {
        $menu = $this->request->getJsonResponse('/main/menu/');
        $this->assertTrue($menu && isset($menu['result']['count']) && $menu['result']['count'], 'Can\'t get menu');

        foreach ($menu['result']['list'] as $module) {
            $this->processModule($module);
        }
    }

    private function processModule($module) {
        foreach ($module['list'] as $controller) {
            $this->processController($controller);
        }
    }

    private function processController($controller) {
        foreach ($controller['actions'] as $action) {
            $reponse = $this->createNewRequest()
                ->getResponse($action['url']);

            $message = sprintf(
                'Can access to url %s. Status code - %d',
                $this->request->getBasePath() . $action['url'],
                $reponse->getStatusCode()
            );

            $this->assertTrue($reponse->getStatusCode() == 403, $message);
        }
    }

}
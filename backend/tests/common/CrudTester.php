<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 25.11.2018
 * Time: 17:58
 */

namespace backend\tests\common;


use backend\tests\common\helpers\RequestHelper;
use PHPUnit\Framework\Assert;

class CrudTester {
    /* @var ModelTestInterface $initiator */
    private $initiator;

    private static $menu;

    public function __construct(ModelTestInterface $initiator) {
        $this->initiator = $initiator;
    }

    public function run() {
        $module = $this->getModuleFromMenu();
        Assert::assertTrue((bool)$module, sprintf("Find module '%s' in menu.", $this->initiator->getModuleName()));
        if ($module) {
            $this->processModels($module);
        }
    }

    /**
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getModuleFromMenu() {
        return $this->getMenu()['result']['list'] ?? false;
    }

    /**
     * @return array|bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getMenu() {
        if (self::$menu === null) {
            $request = RequestHelper::getNewRequest();
            self::$menu = $request->getJsonResponse('/main/menu/');
        }
        return self::$menu;
    }

    /**
     * @param $module
     */
    private function processModels($module) {
        $models = $module['list'] ?? [];

        Assert::assertTrue((bool)$models, 'Process modules ' . implode(', ', array_keys($models)));

        foreach ($models as $model) {
            $modelTest = new ModelCrudTest($model);
            $modelTest->run();
        }
    }
}
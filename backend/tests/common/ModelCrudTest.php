<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.11.2018
 * Time: 21:09
 */

namespace backend\tests\common;


use backend\tests\common\actions\IndexActionTester;
use PHPUnit\Framework\Assert;

class ModelCrudTest {
    private $modelName;
    private $actions = [];

    public function __construct($params) {

        $this->modelName = $params['label'] ?? get_called_class();

        if (!empty($params['actions']) && is_array($params['actions'])) {
            $this->actions = $params['actions'];
        }

        Assert::assertInternalType('array', $params['actions'], 'Find actions in model ' . $this->modelName);

    }

    /**
     *
     */
    public function run() {
        foreach ($this->actions as $actionName => $actionParams) {
            $action = $this->buildAction($actionName, $actionParams);
            $action->run();
        }
    }

    /**
     * @param $actionName
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    private function buildAction($actionName, $params) {
        $action = $this->actions()[$actionName] ?? false;
        if (!$action) {
            throw new \Exception("Can't find action \"" . $actionName . "\"");
        }
        return new $action['class']($params, $action['options'] ?? []);
    }

    private function actions() {
        return [
            'index' => [
                'class' => IndexActionTester::class,
            ],
            'view' => [
                'class' => IndexActionTester::class,
            ],
        ];
    }

}
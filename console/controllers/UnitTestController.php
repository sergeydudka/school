<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 10.11.2018
 * Time: 12:15
 */

namespace app\commands;

use yii\console\Controller;

class UnitTestController extends Controller {


    public function actionRun($name = null) {
        $this->getTestMap();
    }

    private function getTestMap() {
        echo "<pre>";
        var_dump(\Yii::$app->getModules());
        echo "</pre>";
        die();
    }

}
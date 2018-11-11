<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 10.11.2018
 * Time: 12:15
 */

namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class UnitTestController extends Controller {
    const ALL_MODULES = '*';


    public function actionRun($moduleName = self::ALL_MODULES) {
        $map = $this->getTestMap($moduleName);

        if (!$map) {
            $this->stdout("\nModule with name \"" . $this->ansiFormat($moduleName, Console::FG_RED) . "\" not found.\n",
                Console::FG_YELLOW);
            echo "Available modules: " . $this->ansiFormat(implode(', ', array_keys($this->getTestMap
                (self::ALL_MODULES))), Console::FG_YELLOW) . ".\n";
            return ExitCode::UNAVAILABLE;
        }
    }

    /**
     * @param string $moduleName
     * @return array|false
     */
    private function getTestMap($moduleName) {

        $modules = \Yii::$app->getModules();
        if ($moduleName != self::ALL_MODULES) {
            return $modules[$moduleName] ?? false;
        }

        return $modules;
    }

}
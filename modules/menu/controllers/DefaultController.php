<?php

namespace modules\menu\controllers;

use common\classes\ApiController;

/**
 * Default controller for the `adminmenu` module
 */
class DefaultController extends ApiController {
	
	
	public $modelClass = 'Menu';
	
	
	public function actions() {
		
		$actions = parent::actions();
		unset($actions['delete'], $actions['create'], $actions['update']);
		
		$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
		
		return $actions;
		
	}
	
	public function prepareDataProvider() {
		$result = [];
		foreach (\Yii::$app->modules as $id => $module) {
			if ($id == $this->module->id || $id == 'debug' || $id == 'gii') {
				continue;
			}
			
			$class = $this->createClass($module);
			
			$result[$id] = $this->getControllers($id, $class->controllerNamespace);
		}
		
		return $result;
	}
	
	/**
	 * @param string|object $module
	 * @return object
	 */
	private function createClass($module) {
		return is_object($module) ? $module : new $module['class']([]);
	}
	
	private function getControllers($module_id, $controllerNamespace) {
		$realPath = realpath(\Yii::$app->basePath . '/../' . DIRECTORY_SEPARATOR . $controllerNamespace);
		$result = [];
		foreach (scandir($realPath) as $fileName) {
			if ($fileName == '.' || $fileName == '..') {
				continue;
			}
			
			$fileInfo = pathinfo($fileName);
			$class = $controllerNamespace . '\\' . $fileInfo['filename'];
			
			$controller = new $class($fileInfo['filename'], $module_id);
			$result[$fileInfo['filename']] = array_keys($controller->actions());
		}
		return $result;
	}
}

<?php

namespace modules\menu\controllers;

use common\classes\ApiController;

/**
 * Default controller for the `adminmenu` module
 */
class DefaultController extends ApiController {
	
	
	public $modelClass = '';
	
	
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
			
			$name = \yii\helpers\Inflector::camel2id(str_replace('Controller', '', $fileInfo['filename']));
			
			$class = $controllerNamespace . '\\' . $fileInfo['filename'];
			
			$controller = new $class($fileInfo['filename'], $module_id);
			$result[$name] = [
				'class' => $class,
				'url' => '/' . $module_id . '/' . $name,
				'label' => '',
				'actions' => $controller->actions(),
			];
		}
		return $result;
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 17.07.2018
 * Time: 21:47
 */

namespace common\classes;


use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ActionController extends ActiveController {
	
	public function actions() {
		return [
			'index' => [
				'class' => 'common\api\action\IndexAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
			],
			'view' => [
				'class' => 'yii\rest\ViewAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
			],
			'create' => [
				'class' => 'yii\rest\CreateAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
				'scenario' => $this->createScenario,
			],
			'update' => [
				'class' => 'yii\rest\UpdateAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
				'scenario' => $this->updateScenario,
			],
			'delete' => [
				'class' => 'yii\rest\DeleteAction',
				'modelClass' => $this->modelClass,
				'checkAccess' => [$this, 'checkAccess'],
			],
			'options' => [
				'class' => 'yii\rest\OptionsAction',
			],
		];
	}
	
	public function prepareIndex($action, $filter) {
		/* @var $modelClass \yii\db\BaseActiveRecord */
		$modelClass = $action->modelClass;
		
		$query = $modelClass::find();
		if (!empty($filter)) {
			$query->andWhere($filter);
		}
		
		$requestParams = \Yii::$app->getRequest()->getBodyParams();
		if (empty($requestParams)) {
			$requestParams = \Yii::$app->getRequest()->getQueryParams();
		}
		
		return \Yii::createObject([
			'class' => ActiveDataProvider::class,
			'query' => $query,
			'pagination' => [
				'params' => $requestParams,
			],
			'sort' => [
				'params' => $requestParams,
			],
		]);
	}
}
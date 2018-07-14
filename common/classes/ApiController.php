<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 01.07.2018
 * Time: 11:02
 */

namespace common\classes;

use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Response;



class ApiController extends ActiveController {
	private $model = null;
	public function afterAction ($action, $result) {
		/**@var ActiveRecord $model */
		/**@var ActiveDataProvider $result */
		$fields = [];
		$rules = [];
		$labels = [];
		$scenarios = [];
		$errors = [];
		
		if ($this->modelClass) {
			$model = new $this->modelClass();
			$fields = $model->getTableSchema();
			$rules = $model->rules();
			$labels = $model->attributeLabels();
			$scenarios = $model->scenarios();
			$errors = $model->getErrors();
		}
		
		//////////////
		echo '<pre>';
		var_dump($model->getRelation('articleGroup'));
		echo '</pre>';
		die();
		//////////////
		
		$result = [
			'result' => $result->getModels(),
			'fields' => $fields,
			'rules' => $rules,
			'labels' => $labels,
			'scenarios' => $scenarios,
			'errors' => $errors,
		];
		
		
		
		\Yii::$app->response->format = Response::FORMAT_JSON;
		return parent::afterAction($action, $result);
	}
}

/*class ApiController extends Controller {
	public function afterAction ($action, $result) {
		return parent::afterAction($action, $result);
	}
}*/
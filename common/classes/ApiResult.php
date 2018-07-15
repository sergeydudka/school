<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 15.07.2018
 * Time: 18:34
 */

namespace common\classes;


use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

class ApiResult extends BaseObject {
	public $result;
	public $fields;
	public $labels;
	public $rules;
	public $scenarios;
	public $errors;
	
	
	/**
	 * ApiResult constructor.
	 * @param ActiveDataProvider|array $result
	 */
	public function __construct($result) {
		parent::__construct();
		
		if ($result instanceof ActiveDataProvider) {
			$this->result = [
				'list' => $result->getModels(),
				'total' => $result->getTotalCount(),
				'count' => $result->getCount(),
				'behaviours' => $result->getBehaviors(),
			];
		} else {
			$this->result = [
				'list' => $result,
				'total' => count($result),
				'count' => count($result),
				'behaviours' => [],
			];
		}
	}
	
	public function setModel(ActiveRecord $model) {
		$this->fields = $model->getTableSchema();
		$this->rules = $model->rules();
		$this->labels = $model->attributeLabels();
		$this->scenarios = $model->scenarios();
		$this->errors = $model->getErrors();
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 17.07.2018
 * Time: 22:00
 */

namespace common\api\action;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

class IndexAction extends BaseAction {
	/**
	 * @return ActiveDataProvider
	 */
	public function run() {
		if ($this->checkAccess) {
			call_user_func($this->checkAccess, $this->id);
		}
		
		return $this->prepareDataProvider();
	}
	
	
	protected function prepareDataProvider() {
		/* @var $modelClass ActiveRecord */
		$modelClass = new $this->modelClass();
		
		$query = $modelClass::find();
		$columns = $modelClass->getTableSchema()->getColumnNames();
		$select = array_intersect($columns, $this->getFields());
		if (empty($select)) {
			$select = $columns;
		}
		
		$query->select($select);
		$query->where($this->getFilter());
		
		
		return Yii::createObject([
			'class' => ActiveDataProvider::class,
			'query' => $query,
			'pagination' => [
				'params' => $this->requestParams,
			],
			'sort' => [
				'params' => $this->requestParams,
			],
		]);
	}
}
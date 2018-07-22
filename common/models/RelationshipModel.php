<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 22.07.2018
 * Time: 13:14
 */

namespace common\models;


use common\interfaces\RelationshipInteface;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;

abstract class RelationshipModel extends ActiveRecord implements RelationshipInteface {
	public function init() {
		parent::init();
	}
	
	public function afterFind() {
		parent::afterFind();
		
		$class = get_called_class();
		
		if ($class != \Yii::$app->controller->modelClass) {
			return;
		}
		
		/* @var $class RelationshipInteface*/
		
		foreach ($class::relationships() as $attribute => $relationship) {
			if ($this->hasAttribute($attribute)) {
				$this->$attribute = $this->$relationship;
			} else {
				throw new InvalidConfigException('Getting unknown property: ' . $class . '::' . $attribute . '.');
			}
		}
	}
}
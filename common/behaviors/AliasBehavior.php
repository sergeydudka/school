<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 22.07.2018
 * Time: 14:56
 */

namespace common\behaviors;


use modules\alias\models\Alias;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class AliasBehavior extends Behavior {
	/* @var $owner ActiveRecord */
	
	const ALIAS_MODEL = Alias::class;
	
	public function events() {
		return [
			ActiveRecord::EVENT_BEFORE_INSERT => 'setAlias',
			ActiveRecord::EVENT_BEFORE_UPDATE => 'setAlias',
			ActiveRecord::EVENT_AFTER_FIND => 'getAlias',
		];
	}
	
	public function init() {
		parent::init();
	}
	
	public function getRefID() {
		/* @var $owner BaseActiveRecord */
		$owner = $this->owner;
		return $owner->getPrimaryKey();
	}
	
	public function setAlias() {
		return Alias::setAlias($this->getRefID(), get_class($this->owner), $this->owner->alias_id);
	}
	
	public function getAlias() {
		return Alias::getAlias($this->getRefID(), get_class($this->owner));
	}
}
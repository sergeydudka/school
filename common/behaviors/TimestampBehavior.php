<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 04.07.2018
 * Time: 21:56
 */

namespace common\behaviors;


class TimestampBehavior extends \yii\behaviors\TimestampBehavior {
	protected function getValue ($event) {
		if ($this->value === null) {
			return date('Y-m-d H:i:s');
		}
		
		return parent::getValue($event);
	}
}
<?php

namespace modules\users;

/**
 * article module definition class
 */
class Module extends \yii\base\Module {
	/**
	 * {@inheritdoc}
	 */
	public $controllerNamespace = 'modules\users\controllers';
	public $defaultRoute = 'user';
}

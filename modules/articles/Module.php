<?php

namespace modules\articles;

/**
 * article module definition class
 */
class Module extends \yii\base\Module {
	/**
	 * {@inheritdoc}
	 */
	public $controllerNamespace = 'modules\articles\controllers';
	public $defaultRoute = 'article';
}

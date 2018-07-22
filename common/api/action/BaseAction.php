<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 17.07.2018
 * Time: 22:02
 */

namespace common\api\action;

use Yii;
use yii\rest\Action;

class BaseAction extends Action {
	
	public $requestParams;
	
	public function init() {
		parent::init();
		
		$requestParams = Yii::$app->getRequest()->getBodyParams();
		if (empty($requestParams)) {
			$requestParams = Yii::$app->getRequest()->getQueryParams();
		}
		$this->requestParams = $requestParams;
	}
	
	/**
	 * @return array
	 */
	public function getFields() {
		return $this->getRequestParam('fields', []);
	}
	
	/**
	 * @return array
	 */
	public function getFilter() {
		return $this->getRequestParam('filter', []);
	}
	
	private function getRequestParam($name, $default = false) {
		return (
			isset($this->requestParams[$name]) &&
			!empty($this->requestParams[$name])
		) ? $this->requestParams[$name] : $default;
	}
}
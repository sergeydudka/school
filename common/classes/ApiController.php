<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 01.07.2018
 * Time: 11:02
 */

namespace common\classes;

use yii\rest\ActiveController;
use yii\web\Response;


abstract class ApiController extends ActiveController {
	public $user;
	
	/**
	 * ApiController constructor.
	 * @param string $id
	 * @param $module
	 * @param array $config
	 */
	public function __construct(string $id, $module, array $config = []) {
		//if (\Yii::$app->getUser()->getIsGuest() &&
		//	\Yii::$app->request->getPathInfo() !== \Yii::$app->params['loginUrl']) {
		//	$this->redirect([\Yii::$app->params['loginUrl']]);
		//}
		
		parent::__construct($id, $module, $config);
		
		$this->user = \Yii::$app->getUser()->getIdentity();
	}
	
	public function afterAction($action, $result) {
		$response = new ApiResult($result);
		if ($this->modelClass) {
			$response->setModel(new $this->modelClass());
		}
		\Yii::$app->response->format = Response::FORMAT_JSON;
		return parent::afterAction($action, $response);
	}
	
	/*public function checkAccess($action, $model = null, $params = []) {
		parent::checkAccess($action, $model, $params);
	}*/
}

/*class ApiController extends Controller {
	public function afterAction ($action, $result) {
		return parent::afterAction($action, $result);
	}
}*/
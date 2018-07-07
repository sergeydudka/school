<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 01.07.2018
 * Time: 11:02
 */

namespace common\classes;

use yii\helpers\Url;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Response;

/*class ApiController extends ActiveController {
	public function afterAction ($action, $result) {
		\Yii::$app->response->format = Response::FORMAT_JSON;
		return parent::afterAction($action, $result);
	}
}*/

class ApiController extends Controller {
	public function afterAction ($action, $result) {
		return parent::afterAction($action, $result);
	}
}
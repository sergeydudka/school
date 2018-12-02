<?php

namespace backend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class IndexController extends Controller {

	
	/**
	 * {@inheritdoc}
	 */
	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}
	
	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
	    $indexFile = \Yii::$app->getBasePath() . "/web/thewall/dist/school/index.html";
		\Yii::$app->response->content = file_get_contents($indexFile);
		return;
	}
	/**
	 * Login action.
	 *
	 * @return string
	 */
	/*public function actionLogin() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		
		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			$model->password = '';
			
			return $this->render('login', [
				'model' => $model,
			]);
		}
	}*/
	
	/**
	 * Logout action.
	 *
	 * @return string
	 */
	/*public function actionLogout() {
		Yii::$app->user->logout();
		
		return $this->goHome();
	}*/
}

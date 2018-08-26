<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 04.08.2018
 * Time: 14:29
 */

namespace frontend\controllers;


use crudschool\modules\articles\models\ArticleCategory;
use crudschool\modules\articles\models\ArticleGroup;
use yii\web\Controller;

class ArticleCategoriesController extends Controller {
	public function actionIndex() {
		return $this->render('index',
			[
				'categories' => ArticleCategory::find()->all()
			]
		);
	}
	
	public function actionCategory($c_id) {
		return $this->render('category', [
			'category' => ArticleCategory::findOne(['article_category_id' => $c_id]),
			'groups' => ArticleGroup::find()->where(['article_category_id' => $c_id])->all(),
			]
		);
	}
}
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'article_group_id',
            
            [
                'attribute' => 'parent_id',
                'value' => function ($model) {
                    return $model->parent->title;
                }
            ],
	
	        [
		        'attribute' => 'article_category_id',
		        'value' => function ($model) {
			        return $model->articleCategory->title;
		        }
	        ],
            
            'title',
            
            //'description:ntext',
            
            'created_at',
            
            //'ypdated_at',
	
	        [
		        'attribute' => 'created_by',
		        'value' => function ($model) {
			        return $model->created->username;
		        }
	        ],
	
	        [
		        'attribute' => 'updated_by',
		        'value' => function ($model) {
			        return $model->updated->username;
		        }
	        ],
	
	        [
		        'attribute' => 'difficult_id',
		        'value' => function ($model) {
			        return $model->difficult->title;
		        }
	        ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

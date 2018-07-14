<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'article_id',
            'title',
            //'description:ntext',
            'created_at',
            'updated_at',
            'status',
            //'article_group_id',

            [
                'class' => \yii\grid\DataColumn::class,
                'attribute' => 'article_group_id',
                'format' => 'text',
                'value' => function($model, $index, $column) {
                   $group = $model->articleGroup;
                   return $group ? $group->title : '---';
                },
            ],
	
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
	
	        [
		        'attribute' => 'language_id',
		        'value' => function ($model) {
			        return $model->language->title;
		        }
	        ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

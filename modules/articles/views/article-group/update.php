<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\articles\models\ArticleGroup */

$this->title = 'Update Article Group: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->article_group_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

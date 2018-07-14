<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\articles\models\ArticleCategory */

$this->title = 'Update Article Category: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->article_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

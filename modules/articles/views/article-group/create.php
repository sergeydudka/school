<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modules\articles\models\ArticleGroup */

$this->title = 'Create Article Group';
$this->params['breadcrumbs'][] = ['label' => 'Article Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

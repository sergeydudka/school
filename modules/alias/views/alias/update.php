<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\alias\models\Alias */

$this->title = 'Update Alias: ' . $model->alias_id;
$this->params['breadcrumbs'][] = ['label' => 'Aliases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->alias_id, 'url' => ['view', 'id' => $model->alias_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

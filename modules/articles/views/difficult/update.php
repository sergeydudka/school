<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model modules\articles\models\Difficult */

$this->title = 'Update Difficult: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Difficults', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->difficult_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="difficult-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

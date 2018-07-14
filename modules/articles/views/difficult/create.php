<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model modules\articles\models\Difficult */

$this->title = 'Create Difficult';
$this->params['breadcrumbs'][] = ['label' => 'Difficults', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="difficult-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

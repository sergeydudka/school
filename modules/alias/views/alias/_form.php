<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modules\alias\models\Alias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias_id')->textInput() ?>

    <?= $form->field($model, 'language_id')->textInput() ?>

    <?= $form->field($model, 'ref_id')->textInput() ?>

    <?= $form->field($model, 'ref_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

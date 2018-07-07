<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modules\articles\models\ArticleGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 10]) ?>
	
	<?= $form->field($model, 'parent_id')
        ->dropDownList(\modules\articles\models\ArticleGroup::getDropdown(), ['prompt' => '-----']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

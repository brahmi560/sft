<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\techcategories\models\TechCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tech-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'techCategoryName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'techCatDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologies\models\Technologies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'techCategoryId')->dropDownList($model->techcatList, ['prompt' => 'Select Category']) ?>

    <?= $form->field($model, 'techName')->textInput(['maxlength' => true]) ?>

   
    

    <?= $form->field($model, 'techDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => 'Select Status']) ?>

    <?= $form->field($model, 'techMetaTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techMetaKey')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techMetaDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techPageTitle')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

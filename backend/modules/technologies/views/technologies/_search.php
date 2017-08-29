<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologies\models\TechnologiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'techId') ?>

    <?= $form->field($model, 'techName') ?>

    <?= $form->field($model, 'techCategoryId') ?>

    <?= $form->field($model, 'techDescription') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'techMetaTitle') ?>

    <?php // echo $form->field($model, 'techMetaKey') ?>

    <?php // echo $form->field($model, 'techMetaDescription') ?>

    <?php // echo $form->field($model, 'techPageTitle') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'createdDate') ?>

    <?php // echo $form->field($model, 'updatedDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

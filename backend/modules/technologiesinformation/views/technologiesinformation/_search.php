<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologiesinformation\models\TechnologiesInformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'technologyInfoId') ?>

    <?= $form->field($model, 'technologySiteName') ?>

    <?= $form->field($model, 'technologyUrl') ?>

    <?= $form->field($model, 'technologyDescription') ?>

    <?= $form->field($model, 'technologyId') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'createdDate') ?>

    <?php // echo $form->field($model, 'updatedDate') ?>

    <?php // echo $form->field($model, 'techinfoMetaTitle') ?>

    <?php // echo $form->field($model, 'techinfoMetaKey') ?>

    <?php // echo $form->field($model, 'techinfoMetaDescription') ?>

    <?php // echo $form->field($model, 'techinfoPageTitle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

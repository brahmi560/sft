<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologiesinformation\models\TechnologiesInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'technologySiteName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'technologyUrl')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'technologyDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'technologyId')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'createdDate')->textInput() ?>

    <?= $form->field($model, 'updatedDate')->textInput() ?>

    <?= $form->field($model, 'techinfoMetaTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techinfoMetaKey')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techinfoMetaDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techinfoPageTitle')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

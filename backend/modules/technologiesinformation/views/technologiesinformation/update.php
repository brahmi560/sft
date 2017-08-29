<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologiesinformation\models\TechnologiesInformation */

$this->title = 'Update Technologies Information: ' . $model->technologyInfoId;
$this->params['breadcrumbs'][] = ['label' => 'Technologies Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->technologyInfoId, 'url' => ['view', 'id' => $model->technologyInfoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="technologies-information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

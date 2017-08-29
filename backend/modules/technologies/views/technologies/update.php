<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologies\models\Technologies */

$this->title = 'Update Technologies: ' . $model->techId;
$this->params['breadcrumbs'][] = ['label' => 'Technologies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->techId, 'url' => ['view', 'id' => $model->techId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="technologies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

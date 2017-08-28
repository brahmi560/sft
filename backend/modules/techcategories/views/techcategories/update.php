<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\techcategories\models\TechCategories */

$this->title = 'Update Tech Categories: ' . $model->techCatId;
$this->params['breadcrumbs'][] = ['label' => 'Tech Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->techCatId, 'url' => ['view', 'id' => $model->techCatId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tech-categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

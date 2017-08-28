<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\techcategories\models\TechCategories */

$this->title = 'Create Tech Categories';
$this->params['breadcrumbs'][] = ['label' => 'Tech Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tech-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

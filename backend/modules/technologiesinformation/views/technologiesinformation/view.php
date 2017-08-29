<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologiesinformation\models\TechnologiesInformation */

$this->title = $model->technologyInfoId;
$this->params['breadcrumbs'][] = ['label' => 'Technologies Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologies-information-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->technologyInfoId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->technologyInfoId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'technologyInfoId',
            'technologySiteName',
            'technologyUrl:ntext',
            'technologyDescription:ntext',
            'technologyId',
            'status',
            'createdBy',
            'updatedBy',
            'createdDate',
            'updatedDate',
            'techinfoMetaTitle:ntext',
            'techinfoMetaKey:ntext',
            'techinfoMetaDescription:ntext',
            'techinfoPageTitle:ntext',
        ],
    ]) ?>

</div>

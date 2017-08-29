<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\technologiesinformation\models\TechnologiesInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Technologies Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologies-information-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Technologies Information', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'technologyInfoId',
            'technologySiteName',
            'technologyUrl:ntext',
            'technologyDescription:ntext',
            'technologyId',
            // 'status',
            // 'createdBy',
            // 'updatedBy',
            // 'createdDate',
            // 'updatedDate',
            // 'techinfoMetaTitle:ntext',
            // 'techinfoMetaKey:ntext',
            // 'techinfoMetaDescription:ntext',
            // 'techinfoPageTitle:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\technologies\models\TechnologiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Technologies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Technologies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'techId',
            'techName',
            'techCategoryId',
            'techDescription:ntext',
            [
        		'attribute' => 'status',
        		'value' => 'status',
        		'filter' => Html::activeDropDownList($searchModel, 'status', ['Active' => 'Active','In-active' => 'In-active'],['class'=>'form-control','prompt' => 'Status']),
        		],
            // 'techMetaTitle:ntext',
            // 'techMetaKey:ntext',
            // 'techMetaDescription:ntext',
            // 'techPageTitle:ntext',
            // 'createdBy',
            // 'updatedBy',
            // 'createdDate',
            // 'updatedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

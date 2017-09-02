<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologiesinformation\models\TechnologiesInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-information-form">

    <?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'technologyId')->dropDownList($model->technologyList, ['prompt' => 'Select Technology']) ?>
    <?= $form->field($model, 'technologySiteName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'technologyUrl')->textarea(['rows' => 6]) ?>
    
    <?php if($model->techInfoImageupdate != ''){?>
    <div class="form-group col-lg-12 col-sm-12">
   
    </div>
  
    <div class="form-group col-lg-12 col-sm-12">
    <?php $imgeurl = str_replace("frontend","backend",Yii::getAlias('@web/')).$model->techInfoImageupdate;?>

						 		
						 		<?php  
						 		// print_r($imgeurl);exit;?>
						<img class='image' 
							src="<?php
							if($model->techInfoImageupdate)
							{
								
								echo isset( $model->techInfoImageupdate)? Url::base().'/'.$model->techInfoImageupdate : '' ;
							
							}else {
									 echo Url::base()."/images/user-iconnew.png" ;
								      }
								?>"
							 /> 
							 
            <?= $form->field($model, 'techInfoImageupdate')->hiddenInput()->label(false); ?>
            
        
	</div> 
	<?php } ?>
    <?=$form->field ( $model, 'techInfoImage' )->widget ( FileInput::classname (),
   		[ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => 'Tech Category Image', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )?>

    <?= $form->field($model, 'technologyDescription')->textarea(['rows' => 6]) ?>

       

    <?= $form->field($model, 'techinfoMetaTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techinfoMetaKey')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techinfoMetaDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techinfoPageTitle')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

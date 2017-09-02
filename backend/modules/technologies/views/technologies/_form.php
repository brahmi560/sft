<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\technologies\models\Technologies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'techCategoryId')->dropDownList($model->techcatList, ['prompt' => 'Select Category']) ?>

    <?= $form->field($model, 'techName')->textInput(['maxlength' => true]) ?>

   
    

    <?= $form->field($model, 'techDescription')->textarea(['rows' => 6]) ?>
    
    <?php if($model->techImageupdate != ''){?>
    <div class="form-group col-lg-12 col-sm-12">
   
    </div>
  
    <div class="form-group col-lg-12 col-sm-12">
    <?php $imgeurl = str_replace("frontend","backend",Yii::getAlias('@web/')).$model->techImageupdate;?>

						 		
						 		<?php  
						 		// print_r($imgeurl);exit;?>
						<img class='image' 
							src="<?php
							if($model->techImageupdate)
							{
								
								echo isset( $model->techImageupdate)? Url::base().'/'.$model->techImageupdate : '' ;
							
							}else {
									 echo Url::base()."/images/user-iconnew.png" ;
								      }
								?>"
							 /> 
							 
            <?= $form->field($model, 'techImageupdate')->hiddenInput()->label(false); ?>
            
        
	</div> 
	<?php } ?>
    <?=$form->field ( $model, 'techImage' )->widget ( FileInput::classname (),
   		[ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => 'Tech Category Image', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )?> 

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => 'Select Status']) ?>

    <?= $form->field($model, 'techMetaTitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techMetaKey')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techMetaDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techPageTitle')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

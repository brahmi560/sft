<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\modules\techcategories\models\TechCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tech-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'techCategoryName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'techCatDescription')->textarea(['rows' => 6]) ?>
     <?php if($model->techCatImageupdate != ''){?>
    <div class="form-group col-lg-12 col-sm-12">
   
    </div>
  
    <div class="form-group col-lg-12 col-sm-12">
    <?php $imgeurl = str_replace("frontend","backend",Yii::getAlias('@web/')).$model->techCatImageupdate;?>

						 		
						 		<?php  
						 		// print_r($imgeurl);exit;?>
						<img class='image' 
							src="<?php
							if($model->techCatImageupdate)
							{
								
								echo isset( $model->techCatImageupdate)? Url::base().'/'.$model->techCatImageupdate : '' ;
							
							}else {
									 echo Url::base()."/images/user-iconnew.png" ;
								      }
								?>"
							 /> 
							 
            <?= $form->field($model, 'techCatImageupdate')->hiddenInput()->label(false); ?>
            
        
	</div> 
	<?php } ?>
    <?=$form->field ( $model, 'techCatImage' )->widget ( FileInput::classname (),
   		[ 'options' => [ 'accept' => 'image/*' ],'pluginOptions' =>[[ 'browseLabel' => 'Tech Category Image', 'allowedFileExtensions'=>['jpg','png','jpeg'] ]] ] )?>   

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'In-active' => 'In-active', ], ['prompt' => '']) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

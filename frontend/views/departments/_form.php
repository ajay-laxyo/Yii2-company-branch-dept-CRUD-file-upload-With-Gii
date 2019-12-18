<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Companies;
use frontend\models\Branches;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

     <?php $company = ArrayHelper::map(Companies::find()->all(),'c_id','c_name') ?>

     <?= $form->field($model, 'c_c_id')->dropDownList(
        $company, ['id'=>'c_c_id']) ?>
     
     <?=$form->field($model, 'b_b_id')->widget(DepDrop::classname(), [
        'data'=>ArrayHelper::map(Branches::find()->all(), 'b_id', 'b_name' ),
        'options'=>['id'=>'b_id', 'placeholder' => 'Select branch'],

        'pluginOptions'=>[
        'depends'=>['c_c_id'],
        'placeholder'=>'Select branch',
        'url'=>(['/departments/dept'])
         ]
        ]);?>

     <?= $form->field($model, 'd_name')->textInput(['maxlength' => true]) ?>

     <!-- <?= $form->field($model, 'd_created_date')->textInput() ?> -->

     <?= $form->field($model, 'd_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>

     <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
     </div>

     <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Companies;

/* @var $this yii\web\View */
/* @var $model frontend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php  $companies = ArrayHelper::map(Companies::find()->all(),'c_id','c_name'); ?>
        <?php echo $form->field($model, 'c_id[]')->checkboxList(
                    $companies, [
                        'separator' => '<br>',
                                ]);
        ?>

    <?= $form->field($model, 'b_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b_address')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'b_created_date')->textInput() ?> -->

    <?= $form->field($model, 'b_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

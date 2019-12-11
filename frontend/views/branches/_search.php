<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BranchesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'b_id') ?>

    <?= $form->field($model, 'c_id') ?>

    <?= $form->field($model, 'b_name') ?>

    <?= $form->field($model, 'b_address') ?>

    <?= $form->field($model, 'b_created_date') ?>

    <?php // echo $form->field($model, 'b_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

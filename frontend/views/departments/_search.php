<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DepartmentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'd_id') ?>

    <?= $form->field($model, 'c_id') ?>

    <?= $form->field($model, 'b_id') ?>

    <?= $form->field($model, 'd_name') ?>

    <?= $form->field($model, 'd_created_date') ?>

    <?php // echo $form->field($model, 'd_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

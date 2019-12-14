<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmpSalRc */

$this->title = 'Create Emp Sal Rc';
$this->params['breadcrumbs'][] = ['label' => 'Emp Sal Rcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-sal-rc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

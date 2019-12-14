<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employees', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'emp_code',
            'name',
            //'email:email',
            //'mobile',
            [
                'attribute'=>'branch',
                'value'=>'branchesBranch.b_name',
            ],
            [
                'attribute'=>'dept',
                'value'=>'departmentsDept.d_name',
            ],
            //'branch',
            //'dept',
            //'post',
            //'salary',
            //'pro_pic',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

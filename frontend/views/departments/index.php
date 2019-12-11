<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Departments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'d_id',
            [
                'attribute'=>'c_c_id',
                'value'=>'companiesCompany.c_name',
            ],
            [
                'attribute'=>'b_b_id',
                'value'=>'branchesBranch.b_name',
            ],
            'd_name',
            'd_created_date',
            //'d_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

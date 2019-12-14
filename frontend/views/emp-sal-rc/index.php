<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmpSalRcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emp Sal Rcs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-sal-rc-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Emp Sal Rc', ['create'], ['class' => 'btn btn-success']) ?>
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
            'salary',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

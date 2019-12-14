<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'c_name',
            'c_email:email',
            'c_address',
            'c_created_date',
            [
                'attribute' => 'logo',
                'format' => 'html',
                'value' => function($model)
                {
                     return yii\bootstrap\Html::img($model->logo,['width'=>'80', 'height'=>'80']);
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>

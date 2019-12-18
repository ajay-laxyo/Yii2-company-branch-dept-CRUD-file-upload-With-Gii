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
                     return Html::img(Yii::getAlias('@web').'/'.$model->logo, ['height'=>'80px', 'width'=>'80px']);
                }
            ],

        //     [
        //     'attribute'=>'logo',
        //     'value' =>  Html::a(Html::img(Yii::getAlias('@web').'/uploads/'.$st_data->photo, ['alt'=>'some', 'class'=>'thing', 'height'=>'100px', 'width'=>'100px']), ['site/zoom']),
        //     'format' => ['raw'],
        // ],

            // [
            // 'label'=>'logo',
            // 'format'=>'raw',
            // 'value' => function($data){
            //     $url = "http://127.0.0.1/advanced/frontend/web/".$data->logo;
            //     return Html::img($url,['alt'=>'yii']); 
            // }
            // ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    ?>

</div>

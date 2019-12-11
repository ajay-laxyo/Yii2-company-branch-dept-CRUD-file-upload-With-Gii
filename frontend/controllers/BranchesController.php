<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Branches;
use frontend\models\BranchesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BranchesController implements the CRUD actions for Branches model.
 */
class BranchesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::classname(),
                'only'=>['create', 'update', 'delete'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ]
             ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Branches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BranchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Branches model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Branches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Branches();

        if ($model->load(Yii::$app->request->post())) {
             $count =  count($_POST['Branches']['c_id']);
            for($i=0;$i<$count;$i++)
            {
             $model = new Branches();
             $model->c_id = $_POST['Branches']['c_id'][$i] ;
             $model->b_name = $_POST['Branches']['b_name'] ;
             $model->b_address = $_POST['Branches']['b_address'] ;
             $model->b_created_date = date("Y/m/d H:i:s");
             $model->b_status = $_POST['Branches']['b_status'] ;
             $model->save(); 
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Branches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
             $count =  count($_POST['Branches']['c_id']);
            for($i=0;$i<$count;$i++)
            {
             //$model = new Branches();
             $model->c_id = $_POST['Branches']['c_id'][$i] ;
             $model->b_name = $_POST['Branches']['b_name'] ;
             $model->b_address = $_POST['Branches']['b_address'] ;
             $model->b_created_date = date("Y/m/d H:i:s");
             $model->b_status = $_POST['Branches']['b_status'] ;
             $model->save(); 
            }
            return $this->redirect(['view', 'id' => $model->b_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**return $this->redirect(['view', 'id' => $model->b_id]);
     * Deletes an existing Branches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Branches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Branches::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

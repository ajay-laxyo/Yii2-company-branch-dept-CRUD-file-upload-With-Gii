<?php

namespace frontend\controllers;

use Yii;
use frontend\models\EmpSalRc;
use frontend\models\Employees;
use frontend\models\EmployeesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
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
     * Lists all Employees models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employees model.
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
     * Creates a new Employees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employees();
        $model_sal = new EmpSalRc();

        if ($model->load(Yii::$app->request->post())) 
        {
            $imageName = $model->emp_code;
            $model->pro_pic = UploadedFile::getInstance($model, 'pro_pic');
            $model->pro_pic->saveAs( 'profile_pictures/'.$imageName.'.'.$model->pro_pic->extension );

            $model->pro_pic = 'profile_pictures/'.$imageName.'.'.$model->pro_pic->extension;

            $model->e_created_date = date('Y-m-d h:m:s');
            if($model->save())
            {
                $model_sal->emp_code = $model->emp_code;
                $model_sal->name = $model->name;
                $model_sal->salary = $model->salary;

                //print_r($model_sal); die();
                $model_sal->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Employees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        if ($model->load(Yii::$app->request->post())) 
        {
            $imageName = $model->emp_code;
            $model->pro_pic = UploadedFile::getInstance($model, 'pro_pic');
            $model->pro_pic->saveAs( 'profile_pictures/'.$imageName.'.'.$model->pro_pic->extension );

            $model->pro_pic = 'profile_pictures/'.$imageName.'.'.$model->pro_pic->extension;

            $model->e_created_date = date('Y-m-d h:m:s');
            if($model->save())
            {
                $model_sal = new EmpSalRc();

                $code = $model->emp_code;
               
                \Yii::$app
                ->db
                ->createCommand()
                ->delete('emp_sal_rc', ['emp_code' => $code])
                ->execute();
                

                $model_sal->emp_code = $model->emp_code;
                $model_sal->name = $model->name;
                $model_sal->salary = $model->salary;

                //print_r($model_sal); die();
                $model_sal->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Employees model.
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
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

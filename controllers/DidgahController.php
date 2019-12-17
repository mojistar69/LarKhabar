<?php

namespace app\controllers;

use DateTime;
use DateTimeZone;
use Yii;
use app\models\Didgah;
use app\models\DidgahSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DidgahController implements the CRUD actions for Didgah model.
 */
class DidgahController extends Controller
{
    /**
     * {@inheritdoc}
     */

        public function behaviors()
    {
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index','view','create','update','delete','confirm','disapproval'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index','view','create','update','delete','lists','confirm','disapproval'],
                            'roles' => ['admin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index','view','create','update','lists'],
                            'roles' => ['manager'],
                        ],
                        [
                            'allow' => false,
                            'actions' => ['index','view','create','update','delete',
                                'roles' => ['?'],
                            ],
                        ],
                    ],
                ],
            ];

        }
    }


    /**
     * Lists all Didgah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DidgahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Didgah model.
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
     * Creates a new Didgah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Didgah();

        if ($model->load(Yii::$app->request->post()) ) {
            $now = new DateTime(null, new DateTimeZone('Asia/Tehran'));
            $model->tarikh= $now->format('Y-m-d H:i:s');
            if($model->save())
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Didgah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Didgah model.
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

    public function actionConfirm($id)
    {
        $model = $this->findModel($id);
        $model->taeed=1;
        $model->save();
        return $this->redirect(['index']);
    }
    public function actionDisapproval($id)
    {
        $model = $this->findModel($id);
        $model->taeed=0;
        $model->save();
        return $this->redirect(['index']);
    }
    protected function findModel($id)
    {
        if (($model = Didgah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

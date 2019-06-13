<?php

namespace app\controllers;

use app\models\City;
use Yii;
use app\models\Operator;
use app\models\Cityoperator;
use app\models\OperatorSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OperatorController implements the CRUD actions for Operator model.
 */
class OperatorController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update','delete','lists','selected','cancel'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete','lists','selected','cancel'],
                        'roles' => ['admin','manager'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index','view','create','update','delete','lists'],
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $searchModel = new OperatorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Operator();
        if ($model->load(Yii::$app->request->post())) {
            if(City::find()->where(['id' => $model->cityid])->one()) {
                $model->citycode = City::find()->where(['id' => $model->cityid])->one()->code;
            }
            $model->save();

            $city=Yii::$app->request->post('selection');
            $cityoperator = new Cityoperator();
            $cityoperator->cityId = $model->cityid;
            $cityoperator->opid = $model->opid;
            $cityoperator->save();
            if(isset($city))
            foreach ($city as $val) {
                if($val==$cityoperator->cityId);
                    else {
                        $cityoperator = new Cityoperator();
                        $cityoperator->cityId = $val;
                        $cityoperator->opid = $model->opid;
                        $cityoperator->save();
                    }
            }
            return $this->redirect(['view', 'id' => $model->opid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->citycode = City::find()->where(['id' => $model->cityid])->one()->code;
            $model->save();
            $city=Yii::$app->request->post('selection');
            $cityoperator = new Cityoperator();
            Yii::$app
                ->db
                ->createCommand()
                ->delete('cityoperators', ['opid' => $model->opid])
                ->execute();
            $cityoperator->cityId = $model->cityid;
            $cityoperator->opid = $model->opid;
            $cityoperator->save();
            if(isset($city))
            foreach ($city as $val) {
                if($val==$cityoperator->cityId);
                else {
                    $cityoperator = new Cityoperator();
                    $cityoperator->cityId = $val;
                    $cityoperator->opid = $model->opid;
                    $cityoperator->save();
                }
            }
            return $this->redirect(['view', 'id' => $model->opid]);
        }
//        $cityoperator = Cityoperator::find()->where(['opid' => 17])->all();;
//        var_dump($cityoperator[1]);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Operator::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCancelٍٍ()
    {
        return 'ok';
    }


}

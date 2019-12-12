<?php

namespace app\controllers;

use DateTime;
use DateTimeZone;
use Yii;
use app\models\Khabar;
use app\models\KhabarSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KhabarController implements the CRUD actions for Khabar model.
 */
class KhabarController extends Controller
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
                    'only' => ['index','view','create','update','delete'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index','view','create','update','delete','lists'],
                            'roles' => ['admin'],
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


    public function actionIndex()
    {
        $searchModel = new KhabarSearch();
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
        $model = new Khabar();

        if ($model->load(Yii::$app->request->post())) {
            $model->ax_k= 'no file choose';
            $model->ax_b = 'no file choose';
            $model->musicFile1 = UploadedFile::getInstance($model, 'musicFile1');
            $model->musicFile2 = UploadedFile::getInstance($model, 'musicFile2');
            $model->view=0;
            $now = new DateTime(null, new DateTimeZone('Asia/Tehran'));
            $model->tarikh= $now->format('Y-m-d H:i:s');
            $model->save();
            if(isset($model->musicFile1) && isset($model->musicFile2)) {
                $id = $model->id;
                $model->ax_k = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension;
                $model->ax_b = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension;
                if ($model->update()
                    && $model->musicFile1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension)
                    && $model->musicFile2->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension)) {
                    return $this->redirect(['index']);
                }

            }
                else if( isset($model->musicFile1)) {
                    $id = $model->id;
                    $model->ax_k = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension;
                    if ($model->update() && $model->musicFile1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension)
                    ){
                        return $this->redirect(['index']);
                    }
                   }
                else if(isset($model->musicFile2)){
                    $id = $model->id;
                    $model->ax_b = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension;
                    if ($model->update() && $model->musicFile2->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension)
                    ){
                        return $this->redirect(['index']);
                    }
                }

            return $this->redirect(['index']);
                    }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->musicFile1 = UploadedFile::getInstance($model, 'musicFile1');
            $model->musicFile2 = UploadedFile::getInstance($model, 'musicFile2');
            $model->save();
            if(isset($model->musicFile1) && isset($model->musicFile2)) {
                if(file_exists($model->ax_k)){
                    unlink($model->ax_k);
                }
                if(file_exists($model->ax_b)){
                    unlink($model->ax_b);
                }
                $id = $model->id;
                $model->ax_k = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension;
                $model->ax_b = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension;
                if ($model->save()
                    && $model->musicFile1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension)
                    && $model->musicFile2->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension)) {
                    return $this->redirect(['index']);

                }

            }
            else if( isset($model->musicFile1)) {
                if(file_exists($model->ax_k)){
                    unlink($model->ax_k);
                }
                $id = $model->id;
                $model->ax_k = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension;
                if ($model->save()&& $model->musicFile1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension)
                ){
                    return $this->redirect(['index']);
                }
            }
            else if(isset($model->musicFile2)){
                if(file_exists($model->ax_b)){
                    unlink($model->ax_b);
                }
                $id = $model->id;
                $model->ax_b = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension;
                if ($model->save()&&$model->musicFile2->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension)
                ){
                    return $this->redirect(['index']);
                }
            }

            return $this->redirect(['index']);
        }


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
        $query = Khabar::find();
        $query->innerJoinWith('tbl_gorooh');
        $query->andFilterWhere([
            'tbl_khabar.id' => $id,]);
        $model=$query->one();
        if (($model) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

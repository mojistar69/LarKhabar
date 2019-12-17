<?php

namespace app\controllers;

use app\models\Slider;
use app\models\SliderNews;
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
                    'only' => ['index','view','create','update','delete','select','confirm','disapproval'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index','view','create','update','delete','lists','select','confirm','disapproval'],
                            'roles' => ['admin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index','view','create','update','lists','select'],
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
            $model->File3 = UploadedFile::getInstance($model, 'File3');
            $model->save();
            if(isset($model->File3)) {
                if (file_exists($model->film)) {
                    unlink($model->film);
                }
                $id = $model->id;
                $model->film = 'web/' . Yii::$app->params['rbtUploadDir'] . $id . '_film.' . $model->File3->extension;

                if ($model->save()) {
                    if ($model->File3->
                    saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_film.' . $model->File3->extension)) {
                        $m='save film file';
                    } else $m='no save file ';
                } else {
                    $m=0;
                }
            }
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
                    return $this->redirect(['khabar/select','id' => $model->id]);
                }

            }
                else if( isset($model->musicFile1)) {
                    $id = $model->id;
                    $model->ax_k = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension;
                    if ($model->update() && $model->musicFile1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_k.' . $model->musicFile1->extension)
                    ){
                        return $this->redirect(['khabar/select','id' => $model->id]);
                    }
                   }
                else if(isset($model->musicFile2)){
                    $id = $model->id;
                    $model->ax_b = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension;
                    if ($model->update() && $model->musicFile2->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_b.' . $model->musicFile2->extension)
                    ){
                        return $this->redirect(['khabar/select','id' => $model->id]);
                    }
                }

            return $this->redirect(['khabar/select','id' => $model->id]);
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
            $model->File3 = UploadedFile::getInstance($model, 'File3');
            $model->save();
            if(isset($model->File3)) {
                if (file_exists($model->film)) {
                    unlink($model->film);
                }
                $id = $model->id;
                $model->film = 'web/' . Yii::$app->params['rbtUploadDir'] . $id . '_film.' . $model->File3->extension;

                    if ($model->save()) {
                        if ($model->File3->
                        saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_film.' . $model->File3->extension)) {
                                $m='save film file';
                        } else $m= 'no save file ';
                    }

                    else {
                        $m=0;
                    }
            }
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
                    return $this->redirect(['khabar/select','id' => $model->id]);

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
                    return $this->redirect(['khabar/select','id' => $model->id]);
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
                    return $this->redirect(['khabar/select','id' => $model->id]);
                }
            }

            return $this->redirect(['khabar/select','id' => $model->id]);
        }


        return $this->render('update', [
            'model' => $model,
        ]);

    }

    public function actionSelect($id)
    {
        $modelkhabar = $this->findModel($id);
        $model = new Slider();
        $model->g_id=$id;
        $model->titr = $modelkhabar->titr;
        if ($model->load(Yii::$app->request->post())) {
            for($i=1;$i<=10;$i++)
            $this->savePicModel($model,$i);
            return $this->redirect(['index']);
        }
            return $this->render('_formSelectImages', [
                'model' => $model,

            ]);

    }
    public function actionRemove($id,$model)
    {
        $modelkhabar = $this->findModel($id);
        $model = new Slider();
        $model->titr = $modelkhabar->titr;
        if ($model->load(Yii::$app->request->post())) {
            for($i=1;$i<=10;$i++)
                $this->savePicModel($model,$i);
            return $this->redirect(['index']);
        }
        return $this->render('_formSelectImages', [
            'model' => $model,

        ]);

    }
   private function  savePicModel($model,$i){
        $file='File'.$i;
        $description='Description'.$i;
       $model->$file = UploadedFile::getInstance($model, $file);
       if (isset($model->$file)) {
           $pic_model = new SliderNews();
           $pic_model->g_url = 'web/' . Yii::$app->params['rbtUploadDir'] . $model->g_id . '_pic'.$i.'.' . $model->$file->extension;
           $pic_model->g_id = $model->g_id;
           if($model->$description=='')
           $pic_model->g_descript ='-';
           else
               $pic_model->g_descript=$model->$description;

           if ($pic_model->save()
               && $model->$file->saveAs(Yii::$app->params['rbtUploadDir'] . $model->g_id . '_pic'.$i.'.'. $model->$file->extension))
               $m=$i;
       }
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

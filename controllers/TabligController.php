<?php

namespace app\controllers;

use Yii;
use app\models\Tablig;
use app\models\TabligSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TabligController implements the CRUD actions for Tablig model.
 */
class TabligController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tablig models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabligSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tablig model.
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


    public function actionCreate()
    {
        $model = new Tablig();
         $chd=new ChangeDate();

        if ($model->load(Yii::$app->request->post())) {
            $t = explode('/',$model->tarikh_start);
            $model->tarikh_start=$chd->jalali_to_gregorian($t[0], $t[1], $t[2],'/');
            $t = explode('/',$model->tarikh_end);
            $model->tarikh_end=$chd->jalali_to_gregorian($t[0], $t[1], $t[2],'/');
            $model->url_list= 'no file choose';
            $model->url_info = 'no file choose';
            $model->url_list_d = 'no file choose';
            $model->url_info_d = 'no file choose';
            $model->File1 = UploadedFile::getInstance($model, 'File1');
            $model->File2 = UploadedFile::getInstance($model, 'File2');
            $model->File3 = UploadedFile::getInstance($model, 'File3');
            $model->File4 = UploadedFile::getInstance($model, 'File4');
            if ($model->save()){
                echo 'save';
            }

            $id=$model->id;
            if(isset($model->File1) && isset($model->File2)) {
                $model->url_list = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_list.' . $model->File1->extension;
                $model->url_info= 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_info.' . $model->File2->extension;
                if(isset($model->File3) && isset($model->File4)) {
                    $model->url_list_d = 'web/' . Yii::$app->params['rbtUploadDir'] . $id . '_list_d.' . $model->File3->extension;
                    $model->url_info_d = 'web/' . Yii::$app->params['rbtUploadDir'] . $id . '_info_d.' . $model->File4->extension;
                    if ($model->update()
                        && $model->File1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_list.' . $model->File1->extension)
                        && $model->File2->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_info.' . $model->File2->extension)
                        && $model->File3->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_list_d.' . $model->File3->extension)
                        && $model->File4->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_info_d.' . $model->File4->extension))
                    {
                        echo 'file1 and file2 saved';
                    }
                }
                if ($model->update()
                    && $model->File1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_list.' . $model->File1->extension)
                    && $model->File2->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_info.' . $model->File2->extension))
                {
                    echo 'file1 and file2 saved';
                }
            }

//            if(isset($model->File3) && isset($model->File4)) {
//                $model->url_list_d = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_list_d.' . $model->File3->extension;
//                $model->url_info_d= 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_info_d.' . $model->File4->extension;
//                if ($model->update()
//                    && $model->File3->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_list_d.' . $model->File3->extension)
//                    && $model->File4->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_info_d.' . $model->File4->extension))
//                {
//                    echo 'file3 and file4 saved';
//                }
//            }

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tablig model.
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
     * Deletes an existing Tablig model.
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
     * Finds the Tablig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tablig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tablig::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Gorooh;
use app\models\GoroohSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GoroohController implements the CRUD actions for Gorooh model.
 */
class GoroohController extends Controller
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

    /**
     * Lists all Gorooh models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoroohSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gorooh model.
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
     * Creates a new Gorooh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gorooh();

        if ($model->load(Yii::$app->request->post())) {
            $model->ax= 'no file choose';
            $model->musicFile1 = UploadedFile::getInstance($model, 'musicFile1');
            $model->save();
            if(isset($model->musicFile1)){
                $id = $model->id;
                $model->ax = 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_g.' . $model->musicFile1->extension;
                if ($model->update() && $model->musicFile1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_g.' . $model->musicFile1->extension)
                    ) {
                    return $this->redirect(['index']);
                }
                /* we will delete the inserted model if we could not upload the music file */
                $model->delete();

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
        if(file_exists($model->ax)){
            unlink($model->ax);
        }
        if ($model->load(Yii::$app->request->post())) {

            $model->musicFile1 = UploadedFile::getInstance($model, 'musicFile1');

            if(isset($model->musicFile1) ) {

                $id = $model->id;
                $model->ax= 'web/'.Yii::$app->params['rbtUploadDir'] . $id . '_g.' . $model->musicFile1->extension;
                if ($model->save() &&
                    $model->musicFile1->saveAs(Yii::$app->params['rbtUploadDir'] . $id . '_g.' . $model->musicFile1->extension)) {
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

    /**
     * Finds the Gorooh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gorooh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gorooh::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

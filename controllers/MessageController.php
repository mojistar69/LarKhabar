<?php

namespace app\controllers;

use Yii;
use app\models\Messageofuser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class MessageController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delete' => ['GET'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        $identity = Yii::$app->user->identity;

        $query = Messageofuser::find()-> where('receiveId='.$identity->id);
        $query->innerJoinWith('operator');
        $query->innerJoinWith('message');
        $query->addOrderBy('sendDate DESC');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionSend()
    {

        $identity = Yii::$app->user->identity;

        $query = Messageofuser::find()-> where('senderId='.$identity->id);
        $query->innerJoinWith('operatorReceive');
        $query->innerJoinWith('message');
        $query->addOrderBy('sendDate DESC');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('sendMessage', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $query = Messageofuser::find()-> where('messageofusers.id='.$id);
        $query->innerJoinWith('message');
        $row=$query->one();
         $back_url=Yii::$app->homeUrl.'?r=message';
        $tag='<a href="'.$back_url.'">'.'بازگشت'.'<a>';
        echo '<div class="alert alert-success">'.$row->message->body.'
</div>
'.$tag.'
';

        //update seen date
        $Messageofuser = Messageofuser::findOne($id);
        $Messageofuser->seenDate = date("Y-m-d").' '.date("h:i:s");
        $Messageofuser->save();

    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    protected function findModel($id)
    {
        if (($model = Messageofuser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

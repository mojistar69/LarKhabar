<?php

namespace app\controllers;

use app\models\Messageofuser;
use app\models\OperatorSearch;
use Yii;

class SendMessageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new OperatorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=120;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSelected()
    {

        $operators = '';
        if (isset($_GET["body"])) {
            $MessageBody = $_GET["body"];
        }

        if (isset($_GET["selection"])) {
            $operators = Yii::$app->request->get('selection');
        }

        $dataProvider=$this->doQuerySelected($operators,$MessageBody);
//        return $this->render('operatorMasterReport',
//            ['dataProvider' => $dataProvider,
//            ]);
    }

    public function doQuerySelected($operators,$Messagebody)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spiMessagesNew_Insert(:message)")
            ->bindValue(':message', $Messagebody);
        $result = $command->queryAll();
        $messageId=$result[0]['Id'];
        $array_operators = explode(',', $operators);

        foreach ($array_operators as $op){
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand("call spiMessagesOfUsers_Insert(:senderType,
            :receiveType,:senderid,:rcverid,:messageId)")
                ->bindValue(':senderType', 1)
                ->bindValue(':receiveType', 0)
                ->bindValue(':senderid', Yii::$app->user->identity->id)
                ->bindValue(':rcverid', $op)
                ->bindValue(':messageId', $messageId);
             $command->query();
        }

        return $this->redirect( Yii::$app->homeUrl.'?r=message%2Fsend');

    }

    public function select($select_array)
    {
        $selection_str = '';
        foreach ($select_array as $s) {
            $selection_str = $selection_str . ',' . $s;
        }
        $selection_str = substr($selection_str, 1, strlen($selection_str));
        return $selection_str;
    }

    public function actionView($id)
    {
        $query = Messageofuser::find()-> where('messageofusers.id='.$id);
        $query->innerJoinWith('message');
        $row=$query->one();
        $back_url=Yii::$app->homeUrl.'?r=message%2Fsend';
        $tag='<a href="'.$back_url.'">'.'بازگشت'.'<a>';
        echo '<div class="alert alert-success">'.$row->message->body.'
</div>
'.$tag.'
';


    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->homeUrl.'?r=message%2Fsend');
    }

    protected function findModel($id)
    {
        if (($model = Messageofuser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

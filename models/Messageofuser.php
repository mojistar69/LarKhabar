<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "messageofusers".
 *
 * @property int $id
 * @property int $senderType
 * @property int $senderId
 * @property int $receiveType
 * @property int $receiveId
 * @property int $messageId
 * @property int $state
 * @property string $sendDate
 * @property string $seenDate
 */
class Messageofuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $oname;
    public static function tableName()
    {
        return 'messageofusers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['senderType', 'senderId', 'receiveType', 'receiveId', 'messageId', 'state', 'sendDate'], 'required'],
            [['senderType', 'senderId', 'receiveType', 'receiveId', 'messageId', 'state'], 'integer'],
            [['sendDate', 'seenDate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شماره',
            'senderType' => 'Sender Type',
            'senderId' => 'Sender ID',
            'receiveType' => 'Receive Type',
            'receiveId' => 'Receive ID',
            'messageId' => 'Message ID',
            'state' => 'State',
            'sendDate' => 'Send Date',
            'seenDate' => 'Seen Date',
        ];
    }

    public function getOperator()
    {
        return $this->hasOne(Operator::className(), ['opid' => 'senderId']);
    }
    public function getMessage()
    {
        return $this->hasOne(Message::className(), ['id' => 'messageId']);
    }
}

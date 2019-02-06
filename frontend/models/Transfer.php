<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transfer".
 *
 * @property int $tx_hash
 * @property string $status_
 * @property string $dari
 * @property string $untuk
 * @property double $amount
 * @property string $message
 */
class Transfer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transfer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount'], 'number'],
            [['status_'], 'string', 'max' => 30],
            [['dari', 'untuk', 'message'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tx_hash' => 'Tx Hash',
            'status_' => 'Status',
            'dari' => 'Dari',
            'untuk' => 'Untuk',
            'amount' => 'Amount',
            'message' => 'Message',
        ];
    }
}

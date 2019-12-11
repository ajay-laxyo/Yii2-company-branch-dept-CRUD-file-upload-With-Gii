<?php

namespace frontend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $c_id
 * @property string $c_name
 * @property string $c_email
 * @property string $c_address
 * @property string $c_created_date
 * @property string $c_status
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_name', 'c_email', 'c_address', 'c_created_date', 'c_status'], 'required'],
            [['c_created_date'], 'safe'],
            [['c_status'], 'string'],
            [['c_name', 'c_address'], 'string', 'max' => 200],
            [['c_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_name' => 'C Name',
            'c_email' => 'C Email',
            'c_address' => 'C Address',
            'c_created_date' => 'C Created Date',
            'c_status' => 'C Status',
        ];
    }
}

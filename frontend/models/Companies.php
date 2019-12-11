<?php

namespace frontend\models;

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
    public $file;

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
            [['c_name', 'c_email', 'c_address', 'c_created_date', 'logo', 'c_status'], 'required'],
            [['c_created_date'], 'safe'],
            [['c_status'], 'string'],
            [['file'], 'file'],
            [['c_name', 'logo', 'c_address'], 'string', 'max' => 200],
            [['c_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'Company ID',
            'c_name' => 'Company Name',
            'c_email' => 'Company Email',
            'c_address' => 'Company Address',
            'c_created_date' => 'Company Created Date',
            'c_status' => 'Company Status',
            'file' => 'Company Logo',
            'logo' => 'Company Logo',
        ];
    }
}

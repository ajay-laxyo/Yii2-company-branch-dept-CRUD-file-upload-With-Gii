<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $b_id
 * @property int $c_c_id
 * @property string $b_name
 * @property string $b_address
 * @property string $b_created_date
 * @property string $b_status
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_id', 'b_name', 'b_address', 'b_status'], 'required'],
            //[['c_c_id'], 'string'],
            [['b_created_date'], 'safe'],
            [['b_status'], 'string'],
            [['b_name'], 'string', 'max' => 50],
            [['b_address'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'b_id' => 'Branch ID',
            'c_id' => 'Company Name',
            'b_name' => 'Branch Name',
            'b_address' => 'Branch Address',
            'b_created_date' => 'Branch Created Date',
            'b_status' => 'Branch Status',
        ];
    }


    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['c_id' => 'c_id']);
    }

    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['b_id' => 'b_id']);
    }
}

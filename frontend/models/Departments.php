<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $d_id
 * @property int $c_c_id
 * @property int $b_b_id
 * @property string $d_name
 * @property string $d_created_date
 * @property string $d_status
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_c_id', 'b_b_id', 'd_name', 'd_created_date', 'd_status'], 'required'],
            [['c_c_id', 'b_b_id'], 'integer'],
            [['d_created_date'], 'safe'],
            [['d_status'], 'string'],
            [['d_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'd_id' => 'Department ID',
            'c_c_id' => 'Company ID',
            'b_b_id' => 'Branch ID',
            'd_name' => 'Department Name',
            'd_created_date' => 'Department Created Date',
            'd_status' => 'Department Status',
        ];
    }

    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['c_id' => 'c_c_id']);
    }

    public function getBranchesBranch()
    {
        return $this->hasOne(Branches::className(), ['b_id' => 'b_b_id']);
    }
}

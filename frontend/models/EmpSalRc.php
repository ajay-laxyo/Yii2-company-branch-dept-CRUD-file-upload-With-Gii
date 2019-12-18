<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "emp_sal_rc".
 *
 * @property int $id
 * @property int|null $emp_code
 * @property string|null $name
 * @property string|null $salary
 */
class EmpSalRc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emp_sal_rc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_code'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['salary'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_code' => 'Employee Code',
            'name' => 'Full Name',
            'salary' => 'Salary',
        ];
    }
}

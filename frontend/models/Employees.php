<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property int|null $emp_code
 * @property string|null $name
 * @property string|null $email
 * @property string|null $mobile
 * @property int|null $branch
 * @property int|null $dept
 * @property string|null $post
 * @property string|null $salary
 * @property string|null $pro_pic
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_code', 'branch', 'dept', 'name', 'pro_pic', 'email', 'post','mobile', 'salary'], 'required'],
            [['emp_code'], 'unique'],
            [['emp_code', 'branch', 'dept'], 'integer'],
            [['name', 'pro_pic'], 'string', 'max' => 100],
            [['email', 'post'], 'string', 'max' => 50],
            [['mobile', 'salary'], 'string', 'max' => 20],
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
            'email' => 'Email Id',
            'mobile' => 'Mobile number',
            'branch' => 'Branch name',
            'dept' => 'Department',
            'post' => 'Post',
            'salary' => 'Salary',
            'pro_pic' => 'Profile Picture',
        ];
    }

    public function getDepartmentsDept()
    {
        return $this->hasOne(Departments::className(), ['d_id' => 'dept']);
    }

    public function getBranchesBranch()
    {
        return $this->hasOne(Branches::className(), ['b_id' => 'branch']);
    }
}

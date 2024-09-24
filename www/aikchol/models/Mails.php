<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mails}}".
 *
 * @property integer $id
 * @property string $email
 * @property integer $create_time
 */
class Mails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mails}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'create_time'], 'required'],
            [['create_time'], 'integer'],
            [['email'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'create_time' => 'Create Time',
        ];
    }

    //Implement
    public function beforeValidate()
    {
        $this->create_time = time();   
        return parent::beforeValidate();
    }
}

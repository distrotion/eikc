<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%contacts}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $desc
 * @property integer $create_time
 */
class Contacts extends \yii\db\ActiveRecord
{
    public $date_time;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contacts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'desc', 'create_time'], 'required'],
            [['desc'], 'string'],
            [['create_time'], 'integer'],
            [['name', 'email', 'subject'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'desc' => 'Desc',
            'create_time' => 'Create Time',
        ];
    }
}

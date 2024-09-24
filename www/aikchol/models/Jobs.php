<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%jobs}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property integer $location
 * @property string $th_functional
 * @property string $en_functional
 * @property string $th_qualification
 * @property string $en_qualification
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 */
class Jobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%jobs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_title', 'en_title', 'location', 'index_weight', 'show_first', 'active', 'update_time', 'create_time'], 'required'],
            [['show_first', 'location', 'index_weight', 'active', 'update_time', 'create_time'], 'integer'],
            [['th_functional', 'en_functional', 'th_qualification', 'en_qualification'], 'string'],
            [['th_title', 'en_title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'th_title' => 'Th Title',
            'en_title' => 'En Title',
            'location' => 'Location',
            'th_functional' => 'Th Functional',
            'en_functional' => 'En Functional',
            'th_qualification' => 'Th Qualification',
            'en_qualification' => 'En Qualification',
            'index_weight' => 'Index Weight',
            'show_first' => 'Show First',
            'active' => 'Active',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
        ];
    }
}

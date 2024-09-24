<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%doctors}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property integer $service_id
 * @property integer $location
 * @property string $th_image
 * @property string $en_image
 * @property integer $show_first
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%doctors}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_title', 'en_title', 'service_id', 'location', 'th_image', 'en_image', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'required'],
            [['service_id', 'location', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'integer'],
            [['th_title', 'en_title', 'th_image', 'en_image'], 'string', 'max' => 255]
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
            'service_id' => 'Service ID',
            'location' => 'Location',
            'th_image' => 'Th Image',
            'en_image' => 'En Image',
            'show_first' => 'Show First',
            'index_weight' => 'Index Weight',
            'active' => 'Active',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
        ];
    }
}

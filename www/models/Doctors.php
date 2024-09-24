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
 * @property string $line
 * @property string $mobile
 * @property string $image_schedule_th
 * @property string $image_schedule_en
 */
class Doctors extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = "create_doctor";
    const SCENARIO_UPDATE = "update_doctor";
    const IMAGE_PATH = "../aikchol/web/images/doctor/";
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
            [['th_title', 'en_title', 'service_id', 'location', 'th_image', 'en_image', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_CREATE],
            [['th_title', 'en_title', 'service_id', 'location', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['service_id', 'location', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'integer'],
            [['th_title', 'en_title', 'th_image', 'en_image', 'line', 'mobile', 'image_schedule_th', 'image_schedule_en'], 'string', 'max' => 255]
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
            'line' => 'Line',
            'mobile' => 'Mobile',
            'image_schedule_th' => 'Th Image Schedule',
            'image_schedule_en' => 'En Image Schedule',
        ];
    }

    //Implement
    public function beforeValidate()
    {
        if ($this->isNewRecord)
        {
            $this->update_time = time();
            $this->create_time = time();
        }
        else 
        {
            $this->update_time = time();
        }
        return parent::beforeValidate();
    }
}

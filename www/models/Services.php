<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%services}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property integer $location
 * @property string $th_desc
 * @property string $en_desc
 * @property string $th_sub_desc
 * @property string $en_sub_desc
 * @property string $th_left_text
 * @property string $en_left_text
 * @property string $th_right_text
 * @property string $en_right_text
 * @property string $th_address
 * @property string $en_address
 * @property string $th_thumb_image
 * @property string $en_thumb_image
 * @property string $th_panorama_image
 * @property string $en_panorama_image
 * @property string $th_image
 * @property string $en_image
 * @property integer $show_first
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 */
class Services extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = "create_service";
    const SCENARIO_UPDATE = "update_service";
    const IMAGE_PATH = "../aikchol/web/images/service/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%services}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_title', 'en_title', 'location', 'th_thumb_image', 'en_thumb_image', 'th_panorama_image', 'en_panorama_image', 'th_image', 'en_image', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_CREATE],
            [['th_title', 'en_title', 'location', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['location', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'integer'],
            [['th_desc', 'en_desc', 'th_sub_desc', 'en_sub_desc', 'th_left_text', 'en_left_text', 'th_right_text', 'en_right_text', 'th_address', 'en_address'], 'string'],
            [['th_title', 'en_title', 'th_thumb_image', 'en_thumb_image', 'th_panorama_image', 'en_panorama_image', 'th_image', 'en_image'], 'string', 'max' => 255]
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
            'th_desc' => 'Th Desc',
            'en_desc' => 'En Desc',
            'th_sub_desc' => 'Th Sub Desc',
            'en_sub_desc' => 'En Sub Desc',
            'th_left_text' => 'Th Left Text',
            'en_left_text' => 'En Left Text',
            'th_right_text' => 'Th Right Text',
            'en_right_text' => 'En Right Text',
            'th_address' => 'Th Address',
            'en_address' => 'En Address',
            'th_thumb_image' => 'Th Thumb Image',
            'en_thumb_image' => 'En Thumb Image',
            'th_panorama_image' => 'Th Panorama Image',
            'en_panorama_image' => 'En Panorama Image',
            'th_image' => 'Th Image',
            'en_image' => 'En Image',
            'show_first' => 'Show First',
            'index_weight' => 'Index Weight',
            'active' => 'Active',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
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

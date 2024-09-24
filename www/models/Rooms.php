<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%rooms}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property string $th_caption
 * @property string $en_caption
 * @property string $th_desc
 * @property string $en_desc
 * @property string $th_sub_desc
 * @property string $en_sub_desc
 * @property string $th_thumb_image
 * @property string $en_thumb_image
 * @property string $th_panorama_image
 * @property string $en_panorama_image
 * @property string $th_image
 * @property string $en_image
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 */
class Rooms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const SCENARIO_CREATE = "create_room";
    const SCENARIO_UPDATE = "update_room";
    const IMAGE_PATH = "../aikchol/web/images/room/";

    public static function tableName()
    {
        return '{{%rooms}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_title', 'en_title', 'th_thumb_image', 'en_thumb_image', 'th_panorama_image', 'en_panorama_image', 'th_image', 'en_image', 'index_weight', 'active', 'update_time', 'create_time'], 'required','on'=> self::SCENARIO_CREATE],
            [['th_title', 'en_title', 'index_weight', 'active', 'update_time', 'create_time'], 'required','on'=> self::SCENARIO_UPDATE],
            [['th_caption', 'en_caption', 'th_desc', 'en_desc', 'th_sub_desc', 'en_sub_desc'], 'string'],
            [['index_weight', 'active', 'update_time', 'create_time'], 'integer'],
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
            'th_caption' => 'Th Caption',
            'en_caption' => 'En Caption',
            'th_desc' => 'Th Desc',
            'en_desc' => 'En Desc',
            'th_sub_desc' => 'Th Sub Desc',
            'en_sub_desc' => 'En Sub Desc',
            'th_thumb_image' => 'Th Thumb Image',
            'en_thumb_image' => 'En Thumb Image',
            'th_panorama_image' => 'Th Panorama Image',
            'en_panorama_image' => 'En Panorama Image',
            'th_image' => 'Th Image',
            'en_image' => 'En Image',
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

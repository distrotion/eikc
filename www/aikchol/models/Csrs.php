<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%csrs}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property string $th_caption
 * @property string $en_caption
 * @property string $th_desc
 * @property string $en_desc
 * @property string $th_thumb_image
 * @property string $en_thumb_image
 * @property string $th_panorama_image
 * @property string $en_panorama_image
 * @property integer $show_about
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 */
class Csrs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%csrs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_title', 'en_title', 'th_thumb_image', 'en_thumb_image', 'th_panorama_image', 'en_panorama_image', 'index_weight', 'active', 'update_time', 'create_time'], 'required'],
            [['th_caption', 'en_caption', 'th_desc', 'en_desc'], 'string'],
            [['show_about', 'index_weight', 'active', 'update_time', 'create_time'], 'integer'],
            [['th_title', 'en_title', 'th_thumb_image', 'en_thumb_image', 'th_panorama_image', 'en_panorama_image'], 'string', 'max' => 255]
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
            'th_thumb_image' => 'Th Thumb Image',
            'en_thumb_image' => 'En Thumb Image',
            'th_panorama_image' => 'Th Panorama Image',
            'en_panorama_image' => 'En Panorama Image',
            'show_about' => 'Show About',
            'index_weight' => 'Index Weight',
            'active' => 'Active',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
        ];
    }
}

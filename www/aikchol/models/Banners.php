<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%banners}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property string $th_desc
 * @property string $en_desc
 * @property string $th_link_text
 * @property string $en_link_text
 * @property string $th_center_image
 * @property string $en_center_image
 * @property string $th_image
 * @property string $en_image
 * @property string $link
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 */
class Banners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banners}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_title', 'en_title', 'th_desc', 'en_desc', 'th_link_text', 'en_link_text', 'th_center_image', 'en_center_image', 'th_image', 'en_image', 'link', 'index_weight', 'active', 'update_time', 'create_time'], 'required'],
            [['index_weight', 'active', 'update_time', 'create_time'], 'integer'],
            [['th_title', 'en_title', 'th_desc', 'en_desc', 'th_link_text', 'en_link_text', 'th_center_image', 'en_center_image', 'th_image', 'en_image', 'link'], 'string', 'max' => 255]
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
            'th_desc' => 'Th Desc',
            'en_desc' => 'En Desc',
            'th_link_text' => 'Th Link Text',
            'en_link_text' => 'En Link Text',
            'th_center_image' => 'Th Center Image',
            'en_center_image' => 'En Center Image',
            'th_image' => 'Th Image',
            'en_image' => 'En Image',
            'link' => 'Link',
            'index_weight' => 'Index Weight',
            'active' => 'Active',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
        ];
    }
}

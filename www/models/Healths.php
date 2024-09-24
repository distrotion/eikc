<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%healths}}".
 *
 * @property integer $id
 * @property string $th_title
 * @property string $en_title
 * @property string $th_caption
 * @property string $en_caption
 * @property string $th_desc
 * @property string $en_desc
 * @property string $th_left_text
 * @property string $en_left_text
 * @property string $th_right_text
 * @property string $en_right_text
 * @property string $th_thumb_image
 * @property string $en_thumb_image
 * @property string $th_image
 * @property string $en_image
 * @property integer $show_first
 * @property integer $index_weight
 * @property integer $active
 * @property integer $update_time
 * @property integer $create_time
 */
class Healths extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = "create_health";
    const SCENARIO_UPDATE = "update_health";
    const IMAGE_PATH = "../aikchol/web/images/health/";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%healths}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_title', 'en_title', 'th_thumb_image', 'en_thumb_image', 'th_image', 'en_image', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_CREATE],
            [['th_title', 'en_title', 'show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['th_caption', 'en_caption', 'th_desc', 'en_desc', 'th_left_text', 'en_left_text', 'th_right_text', 'en_right_text'], 'string'],
            [['show_first', 'index_weight', 'active', 'update_time', 'create_time'], 'integer'],
            [['th_title', 'en_title', 'th_thumb_image', 'en_thumb_image', 'th_image', 'en_image'], 'string', 'max' => 255]
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
            'th_left_text' => 'Th Left Text',
            'en_left_text' => 'En Left Text',
            'th_right_text' => 'Th Right Text',
            'en_right_text' => 'En Right Text',
            'th_thumb_image' => 'Th Thumb Image',
            'en_thumb_image' => 'En Thumb Image',
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

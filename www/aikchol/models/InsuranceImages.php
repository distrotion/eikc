<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%insurance_images}}".
 *
 * @property integer $id
 * @property string $th_image
 * @property string $en_image
 * @property integer $index_weight
 * @property integer $update_time
 * @property integer $create_time
 */
class InsuranceImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%insurance_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['th_image', 'en_image', 'show_first', 'index_weight', 'update_time', 'create_time'], 'required'],
            [['show_first', 'index_weight', 'update_time', 'create_time'], 'integer'],
            [['th_image', 'en_image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'th_image' => 'Th Image',
            'en_image' => 'En Image',
            'show_first' => 'Show First',
            'index_weight' => 'Index Weight',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
        ];
    }
}

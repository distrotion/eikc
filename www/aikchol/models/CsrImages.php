<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%csr_images}}".
 *
 * @property integer $id
 * @property integer $csr_id
 * @property string $th_image
 * @property string $en_image
 * @property integer $index_weight
 * @property integer $update_time
 * @property integer $create_time
 */
class CsrImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%csr_images}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['csr_id', 'index_weight', 'update_time', 'create_time'], 'integer'],
            [['th_image', 'en_image', 'index_weight', 'update_time', 'create_time'], 'required'],
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
            'csr_id' => 'Csr ID',
            'th_image' => 'Th Image',
            'en_image' => 'En Image',
            'index_weight' => 'Index Weight',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
        ];
    }
}

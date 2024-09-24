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
    const SCENARIO_CREATE = "create_csr_image";
    const SCENARIO_UPDATE = "update_csr_image";
    const IMAGE_PATH = "../aikchol/web/images/csr/";
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
            [['th_image', 'en_image', 'index_weight', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_CREATE],
            [['index_weight', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_UPDATE],
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

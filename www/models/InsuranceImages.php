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
    const SCENARIO_CREATE = "create_insurance_image";
    const SCENARIO_UPDATE = "update_insurance_image";
    const IMAGE_PATH = "../aikchol/web/images/insurance/";
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
            [['th_image', 'en_image', 'show_first', 'index_weight', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_CREATE],
            [['show_first', 'index_weight', 'update_time', 'create_time'], 'required', 'on' => self::SCENARIO_UPDATE],
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
            'index_weight' => 'Index Weight',
            'show_first' => 'Show First',
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

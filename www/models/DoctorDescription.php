<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%doctors}}".
 *
 * @property integer $id
 * @property integer $doctorId
 * @property string $information_year_th
 * @property string $information_year_en
 * @property string $information_th
 * @property string $information_en
 * @property string $specialized_training_year_th
 * @property string $specialized_training_year_en
 * @property string $specialized_training_th
 * @property string $specialized_training_en
 */
class DoctorDescription extends \yii\db\ActiveRecord
{
    public $information;
    public $trainning;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%doctor_description}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctorId'], 'required'],
            [['doctorId'], 'integer'],
            [['information_year_th', 'information_year_en', 'information_th', 'information_en', 'specialized_training_year_th', 'specialized_training_year_en','specialized_training_th', 'specialized_training_en'], 'string', 'max' => 255],
            [['doctorId'], 'exist', 'skipOnError' => true, 'targetClass' => Doctors::className(), 'targetAttribute' => ['doctorId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctorId' => 'Doctor Id',
            'information_year_th' => 'Information Year Th',
            'information_year_en' => 'Information Year En',
            'information_th' => 'Information Th',
            'information_en' => 'Information En',
            'specialized_training_year_th' => 'Specialized Training Year Th',
            'specialized_training_year_en' => 'Specialized Training Year En',
            'specialized_training_th' => 'Specialized Training Th',
            'specialized_training_en' => 'Specialized Training En',
            'information' => 'Information',
            'trainning' => 'Specialized Training',
        ];
    }

    public function getDoctor()
    {
        return $this->hasOne(Doctors::className(), ['id' => 'doctorId']);
    }

}

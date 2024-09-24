<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%appointments}}".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $doctor_id
 * @property integer $appointment_date
 * @property integer $appointment_time
 * @property string $symptom
 * @property string $name
 * @property string $lastname
 * @property string $birthdate
 * @property integer $gender
 * @property string $telephone
 * @property string $email
 * @property string $nationality
 * @property integer $visited
 * @property integer $create_time
 */
class Appointments extends \yii\db\ActiveRecord
{
    public $appointment_str;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%appointments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'doctor_id', 'appointment_date', 'appointment_time', 'name', 'lastname', 'birthdate', 'gender', 'telephone', 'email', 'nationality', 'visited', 'create_time'], 'required'],
            [['service_id', 'doctor_id', 'appointment_date', 'appointment_time', 'gender', 'visited', 'create_time'], 'integer'],
            [['symptom'], 'string'],
            [['name', 'lastname', 'birthdate', 'telephone', 'email', 'nationality'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'doctor_id' => 'Doctor ID',
            'appointment_date' => 'Appointment Date',
            'appointment_time' => 'Appointment Time',
            'symptom' => 'Symptom',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
            'gender' => 'Gender',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'nationality' => 'Nationality',
            'visited' => 'Visited',
            'create_time' => 'Create Time',
        ];
    }
}

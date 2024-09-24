<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%applied}}".
 *
 * @property integer $id
 * @property integer $job_id
 * @property string $salary
 * @property integer $gender
 * @property string $name
 * @property string $lastname
 * @property string $birthdate
 * @property string $weight
 * @property string $height
 * @property string $race
 * @property string $nationality
 * @property string $religion
 * @property string $address
 * @property string $road
 * @property string $amphur
 * @property string $district
 * @property string $province
 * @property string $postcode
 * @property string $email
 * @property string $telephone
 * @property string $mobile
 * @property string $id_no
 * @property string $issued_at
 * @property string $expired
 * @property string $highschool
 * @property string $highschool_major
 * @property string $highschool_attend
 * @property string $highschool_gpa
 * @property string $vocational
 * @property string $vocational_major
 * @property string $vocational_attend
 * @property string $vocational_gpa
 * @property string $diploma
 * @property string $diploma_major
 * @property string $diploma_attend
 * @property string $diploma_gpa
 * @property string $bachelor
 * @property string $bachelor_major
 * @property string $bachelor_attend
 * @property string $bachelor_gpa
 * @property string $master
 * @property string $master_major
 * @property string $master_attend
 * @property string $master_gpa
 * @property string $others
 * @property string $others_major
 * @property string $others_attend
 * @property string $others_gpa
 * @property integer $thai_speaking
 * @property integer $thai_writing
 * @property integer $thai_reading
 * @property integer $english_speaking
 * @property integer $english_writing
 * @property integer $english_reading
 * @property string $working_experience
 * @property string $company_1
 * @property string $company_1_telephone
 * @property string $company_1_from
 * @property string $company_1_to
 * @property string $company_1_position
 * @property string $company_1_desc
 * @property string $company_1_salary
 * @property string $company_2
 * @property string $company_2_telephone
 * @property string $company_2_from
 * @property string $company_2_to
 * @property string $company_2_position
 * @property string $company_2_desc
 * @property string $company_2_salary
 * @property string $company_3
 * @property string $company_3_telephone
 * @property string $company_3_from
 * @property string $company_3_to
 * @property string $company_3_position
 * @property string $company_3_desc
 * @property string $company_3_salary
 * @property integer $create_time
 */
class Applied extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%applied}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'salary', 'name', 'lastname', 'address', 'email', 'mobile', 'create_time'], 'required'],
            [['job_id', 'gender', 'thai_speaking', 'thai_writing', 'thai_reading', 'english_speaking', 'english_writing', 'english_reading', 'create_time'], 'integer'],
            [['salary', 'name', 'lastname', 'birthdate', 'address', 'company_1', 'company_1_position', 'company_1_desc', 'company_2', 'company_2_position', 'company_2_desc', 'company_3', 'company_3_position', 'company_3_desc'], 'string', 'max' => 512],
            [['weight', 'height', 'race', 'nationality', 'religion', 'road', 'amphur', 'district', 'province', 'postcode', 'email', 'telephone', 'mobile', 'id_no', 'issued_at', 'expired', 'highschool', 'highschool_major', 'highschool_attend', 'highschool_gpa', 'vocational', 'vocational_major', 'vocational_attend', 'vocational_gpa', 'diploma', 'diploma_major', 'diploma_attend', 'diploma_gpa', 'bachelor', 'bachelor_major', 'bachelor_attend', 'bachelor_gpa', 'master', 'master_major', 'master_attend', 'master_gpa', 'others', 'others_major', 'others_attend', 'others_gpa', 'working_experience', 'company_1_telephone', 'company_1_from', 'company_1_to', 'company_1_salary', 'company_2_telephone', 'company_2_from', 'company_2_to', 'company_2_salary', 'company_3_telephone', 'company_3_from', 'company_3_to', 'company_3_salary'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'salary' => 'Salary',
            'gender' => 'Gender',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'birthdate' => 'Birthdate',
            'weight' => 'Weight',
            'height' => 'Height',
            'race' => 'Race',
            'nationality' => 'Nationality',
            'religion' => 'Religion',
            'address' => 'Address',
            'road' => 'Road',
            'amphur' => 'Amphur',
            'district' => 'District',
            'province' => 'Province',
            'postcode' => 'Postcode',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'mobile' => 'Mobile',
            'id_no' => 'Id No',
            'issued_at' => 'Issued At',
            'expired' => 'Expired',
            'highschool' => 'Highschool',
            'highschool_major' => 'Highschool Major',
            'highschool_attend' => 'Highschool Attend',
            'highschool_gpa' => 'Highschool Gpa',
            'vocational' => 'Vocational',
            'vocational_major' => 'Vocational Major',
            'vocational_attend' => 'Vocational Attend',
            'vocational_gpa' => 'Vocational Gpa',
            'diploma' => 'Diploma',
            'diploma_major' => 'Diploma Major',
            'diploma_attend' => 'Diploma Attend',
            'diploma_gpa' => 'Diploma Gpa',
            'bachelor' => 'Bachelor',
            'bachelor_major' => 'Bachelor Major',
            'bachelor_attend' => 'Bachelor Attend',
            'bachelor_gpa' => 'Bachelor Gpa',
            'master' => 'Master',
            'master_major' => 'Master Major',
            'master_attend' => 'Master Attend',
            'master_gpa' => 'Master Gpa',
            'others' => 'Others',
            'others_major' => 'Others Major',
            'others_attend' => 'Others Attend',
            'others_gpa' => 'Others Gpa',
            'thai_speaking' => 'Thai Speaking',
            'thai_writing' => 'Thai Writing',
            'thai_reading' => 'Thai Reading',
            'english_speaking' => 'English Speaking',
            'english_writing' => 'English Writing',
            'english_reading' => 'English Reading',
            'working_experience' => 'Working Experience',
            'company_1' => 'Company 1',
            'company_1_telephone' => 'Company 1 Telephone',
            'company_1_from' => 'Company 1 From',
            'company_1_to' => 'Company 1 To',
            'company_1_position' => 'Company 1 Position',
            'company_1_desc' => 'Company 1 Desc',
            'company_1_salary' => 'Company 1 Salary',
            'company_2' => 'Company 2',
            'company_2_telephone' => 'Company 2 Telephone',
            'company_2_from' => 'Company 2 From',
            'company_2_to' => 'Company 2 To',
            'company_2_position' => 'Company 2 Position',
            'company_2_desc' => 'Company 2 Desc',
            'company_2_salary' => 'Company 2 Salary',
            'company_3' => 'Company 3',
            'company_3_telephone' => 'Company 3 Telephone',
            'company_3_from' => 'Company 3 From',
            'company_3_to' => 'Company 3 To',
            'company_3_position' => 'Company 3 Position',
            'company_3_desc' => 'Company 3 Desc',
            'company_3_salary' => 'Company 3 Salary',
            'create_time' => 'Create Time',
        ];
    }
}

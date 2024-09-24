<?php

use yii\db\Schema;
use yii\db\Migration;

class m150924_032033_create_ahc_applied extends Migration
{
    public function up()
    {
        $this->createTable("{{%applied}}", [
            'id'                    => Schema::TYPE_PK,
            'job_id'                => Schema::TYPE_INTEGER.' NOT NULL',
            'salary'                => Schema::TYPE_STRING.'(512) NOT NULL',
            'gender'                => Schema::TYPE_INTEGER.' NOT NULL',
            'name'                  => Schema::TYPE_STRING.'(512) NOT NULL',
            'lastname'              => Schema::TYPE_STRING.'(512) NOT NULL',
            'birthdate'             => Schema::TYPE_STRING.'(512)',
            'weight'                => Schema::TYPE_STRING.'(255)',
            'height'                => Schema::TYPE_STRING.'(255)',
            'race'                  => Schema::TYPE_STRING.'(255)',
            'nationality'           => Schema::TYPE_STRING.'(255)',
            'religion'              => Schema::TYPE_STRING.'(255)',
            'address'               => Schema::TYPE_STRING.'(512) NOT NULL',
            'road'                  => Schema::TYPE_STRING.'(255)',
            'amphur'                => Schema::TYPE_STRING.'(255)',
            'district'              => Schema::TYPE_STRING.'(255)',
            'province'              => Schema::TYPE_STRING.'(255)',
            'postcode'              => Schema::TYPE_STRING.'(255)',
            'email'                 => Schema::TYPE_STRING.'(255) NOT NULL',
            'telephone'             => Schema::TYPE_STRING.'(255)',
            'mobile'                => Schema::TYPE_STRING.'(255) NOT NULL',
            'id_no'                 => Schema::TYPE_STRING.'(255)',
            'issued_at'             => Schema::TYPE_STRING.'(255)',
            'expired'               => Schema::TYPE_STRING.'(255)',
            'highschool'            => Schema::TYPE_STRING.'(255)',
            'highschool_major'      => Schema::TYPE_STRING.'(255)',
            'highschool_attend'     => Schema::TYPE_STRING.'(255)',
            'highschool_gpa'        => Schema::TYPE_STRING.'(255)',
            'vocational'            => Schema::TYPE_STRING.'(255)',
            'vocational_major'      => Schema::TYPE_STRING.'(255)',
            'vocational_attend'     => Schema::TYPE_STRING.'(255)',
            'vocational_gpa'        => Schema::TYPE_STRING.'(255)',
            'diploma'               => Schema::TYPE_STRING.'(255)',
            'diploma_major'         => Schema::TYPE_STRING.'(255)',
            'diploma_attend'        => Schema::TYPE_STRING.'(255)',
            'diploma_gpa'           => Schema::TYPE_STRING.'(255)',
            'bachelor'              => Schema::TYPE_STRING.'(255)',
            'bachelor_major'        => Schema::TYPE_STRING.'(255)',
            'bachelor_attend'       => Schema::TYPE_STRING.'(255)',
            'bachelor_gpa'          => Schema::TYPE_STRING.'(255)',
            'master'                => Schema::TYPE_STRING.'(255)',
            'master_major'          => Schema::TYPE_STRING.'(255)',
            'master_attend'         => Schema::TYPE_STRING.'(255)',
            'master_gpa'            => Schema::TYPE_STRING.'(255)',
            'others'                => Schema::TYPE_STRING.'(255)',
            'others_major'          => Schema::TYPE_STRING.'(255)',
            'others_attend'         => Schema::TYPE_STRING.'(255)',
            'others_gpa'            => Schema::TYPE_STRING.'(255)',
            'thai_speaking'         => Schema::TYPE_INTEGER,
            'thai_writing'          => Schema::TYPE_INTEGER,
            'thai_reading'          => Schema::TYPE_INTEGER,
            'english_speaking'      => Schema::TYPE_INTEGER,
            'english_writing'       => Schema::TYPE_INTEGER,
            'english_reading'       => Schema::TYPE_INTEGER,
            'working_experience'    => Schema::TYPE_STRING.'(255)',
            'company_1'             => Schema::TYPE_STRING.'(512)',
            'company_1_telephone'   => Schema::TYPE_STRING.'(255)',
            'company_1_from'        => Schema::TYPE_STRING.'(255)',
            'company_1_to'          => Schema::TYPE_STRING.'(255)',
            'company_1_position'    => Schema::TYPE_STRING.'(512)',
            'company_1_desc'        => Schema::TYPE_STRING.'(512)',
            'company_1_salary'      => Schema::TYPE_STRING.'(255)',
            'company_2'             => Schema::TYPE_STRING.'(512)',
            'company_2_telephone'   => Schema::TYPE_STRING.'(255)',
            'company_2_from'        => Schema::TYPE_STRING.'(255)',
            'company_2_to'          => Schema::TYPE_STRING.'(255)',
            'company_2_position'    => Schema::TYPE_STRING.'(512)',
            'company_2_desc'        => Schema::TYPE_STRING.'(512)',
            'company_2_salary'      => Schema::TYPE_STRING.'(255)',
            'company_3'             => Schema::TYPE_STRING.'(512)',
            'company_3_telephone'   => Schema::TYPE_STRING.'(255)',
            'company_3_from'        => Schema::TYPE_STRING.'(255)',
            'company_3_to'          => Schema::TYPE_STRING.'(255)',
            'company_3_position'    => Schema::TYPE_STRING.'(512)',
            'company_3_desc'        => Schema::TYPE_STRING.'(512)',
            'company_3_salary'      => Schema::TYPE_STRING.'(255)',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%applied}}");
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

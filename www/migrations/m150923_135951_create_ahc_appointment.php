<?php

use yii\db\Schema;
use yii\db\Migration;

class m150923_135951_create_ahc_appointment extends Migration
{
    public function up()
    {
        $this->createTable("{{%appointments}}", [
            'id'                => Schema::TYPE_PK,
            'service_id'        => Schema::TYPE_INTEGER.' NOT NULL',
            'doctor_id'         => Schema::TYPE_INTEGER.' NOT NULL',
            'appointment_date'  => Schema::TYPE_INTEGER.' NOT NULL',
            'appointment_time'  => Schema::TYPE_INTEGER.' NOT NULL',
            'symptom'           => Schema::TYPE_TEXT,
            'name'              => Schema::TYPE_STRING.'(512) NOT NULL',
            'lastname'          => Schema::TYPE_STRING.'(512) NOT NULL',
            'birthdate'         => Schema::TYPE_STRING.'(512) NOT NULL',
            'gender'            => Schema::TYPE_INTEGER.' NOT NULL',
            'telephone'         => Schema::TYPE_STRING.'(512) NOT NULL',
            'email'             => Schema::TYPE_STRING.'(512) NOT NULL',
            'nationality'       => Schema::TYPE_TEXT.' NOT NULL',
            'visited'           => Schema::TYPE_INTEGER.' NOT NULL',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%appointments}}");
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

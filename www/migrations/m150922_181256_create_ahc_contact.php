<?php

use yii\db\Schema;
use yii\db\Migration;

class m150922_181256_create_ahc_contact extends Migration
{
    public function up()
    {
        $this->createTable("{{%contacts}}", [
            'id'                => Schema::TYPE_PK,
            'name'              => Schema::TYPE_STRING.'(512) NOT NULL',
            'email'             => Schema::TYPE_STRING.'(512) NOT NULL',
            'subject'           => Schema::TYPE_STRING.'(512) NOT NULL',
            'desc'              => Schema::TYPE_TEXT.' NOT NULL',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%contacts}}");
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m150922_172253_create_ahc_mail extends Migration
{
    public function up()
    {
        $this->createTable("{{%mails}}", [
            'id'                => Schema::TYPE_PK,
            'email'             => Schema::TYPE_STRING.'(512) NOT NULL',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%mails}}");
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

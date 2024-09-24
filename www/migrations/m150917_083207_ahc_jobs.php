<?php

use yii\db\Schema;
use yii\db\Migration;

class m150917_083207_ahc_jobs extends Migration
{
    public function up()
    {
        $this->createTable("{{%jobs}}", [
            'id'                => Schema::TYPE_PK,
            'th_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'location'          => Schema::TYPE_INTEGER.' NOT NULL',
            'th_functional'     => Schema::TYPE_TEXT,
            'en_functional'     => Schema::TYPE_TEXT,
            'th_qualification'  => Schema::TYPE_TEXT,
            'en_qualification'  => Schema::TYPE_TEXT,
            'index_weight'      => Schema::TYPE_INTEGER.' NOT NULL',
            'active'            => Schema::TYPE_INTEGER.' NOT NULL',
            'update_time'       => Schema::TYPE_INTEGER.' NOT NULL',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%jobs}}");
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

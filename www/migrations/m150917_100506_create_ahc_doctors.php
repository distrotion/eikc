<?php

use yii\db\Schema;
use yii\db\Migration;

class m150917_100506_create_ahc_doctors extends Migration
{
    public function up()
    {
        $this->createTable("{{%doctors}}", [
            'id'                => Schema::TYPE_PK,
            'th_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'service_id'        => Schema::TYPE_INTEGER.' NOT NULL',
            'location'          => Schema::TYPE_INTEGER.' NOT NULL',
            'th_image'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_image'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'show_first'        => Schema::TYPE_INTEGER.' NOT NULL',
            'index_weight'      => Schema::TYPE_INTEGER.' NOT NULL',
            'active'            => Schema::TYPE_INTEGER.' NOT NULL',
            'update_time'       => Schema::TYPE_INTEGER.' NOT NULL',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%doctors}}");
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

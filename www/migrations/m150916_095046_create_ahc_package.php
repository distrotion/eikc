<?php

use yii\db\Schema;
use yii\db\Migration;

class m150916_095046_create_ahc_package extends Migration
{
    public function up()
    {
        $this->createTable("{{%packages}}", [
            'id'                => Schema::TYPE_PK,
            'th_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'th_caption'        => Schema::TYPE_TEXT,
            'en_caption'        => Schema::TYPE_TEXT,
            'location'          => Schema::TYPE_INTEGER.' NOT NULL',
            'th_desc'           => Schema::TYPE_TEXT,
            'en_desc'           => Schema::TYPE_TEXT,
            'th_left_text'      => Schema::TYPE_TEXT,
            'en_left_text'      => Schema::TYPE_TEXT,
            'th_right_text'     => Schema::TYPE_TEXT,
            'en_right_text'     => Schema::TYPE_TEXT,
            'th_thumb_image'    => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_thumb_image'    => Schema::TYPE_STRING.'(255) NOT NULL',
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
        $this->dropTable("{{%packages}}");
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

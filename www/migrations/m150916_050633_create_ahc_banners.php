<?php

use yii\db\Schema;
use yii\db\Migration;

class m150916_050633_create_ahc_banners extends Migration
{
    public function up()
    {
        $this->createTable("{{%banners}}", [
            'id'                => Schema::TYPE_PK,
            'th_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_title'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'th_desc'           => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_desc'           => Schema::TYPE_STRING.'(255) NOT NULL',
            'th_link_text'      => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_link_text'      => Schema::TYPE_STRING.'(255) NOT NULL',
            'th_center_image'   => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_center_image'   => Schema::TYPE_STRING.'(255) NOT NULL',
            'th_image'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_image'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'link'              => Schema::TYPE_STRING.'(255) NOT NULL',
            'index_weight'      => Schema::TYPE_INTEGER.' NOT NULL',
            'active'            => Schema::TYPE_INTEGER.' NOT NULL',
            'update_time'       => Schema::TYPE_INTEGER.' NOT NULL',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable("{{%banners}}");
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

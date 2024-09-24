<?php

use yii\db\Schema;
use yii\db\Migration;

class m150917_024853_create_ahc_csr_images extends Migration
{
    public function up()
    {
        $this->createTable('{{%csr_images}}', [
            'id'                => Schema::TYPE_PK,
            'csr_id'            => Schema::TYPE_INTEGER,
            'th_image'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'en_image'          => Schema::TYPE_STRING.'(255) NOT NULL',
            'index_weight'      => Schema::TYPE_INTEGER.' NOT NULL',
            'update_time'       => Schema::TYPE_INTEGER.' NOT NULL',
            'create_time'       => Schema::TYPE_INTEGER.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%csr_images}}');
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

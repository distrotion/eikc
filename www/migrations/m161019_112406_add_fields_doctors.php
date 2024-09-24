<?php

use yii\db\Migration;

class m161019_112406_add_fields_doctors extends Migration
{
    const DOCTER_TABLE_NAME = '{{%doctors}}';
    public function up()
    {
        $this->addColumn(self::DOCTER_TABLE_NAME, 'line', $this->string());
        $this->addColumn(self::DOCTER_TABLE_NAME, 'mobile', $this->string());
        $this->addColumn(self::DOCTER_TABLE_NAME, 'image_schedule_th', $this->string());
        $this->addColumn(self::DOCTER_TABLE_NAME, 'image_schedule_en', $this->string());
    }

    public function down()
    {
        $this->dropColumn(self::DOCTER_TABLE_NAME, 'line');
        $this->dropColumn(self::DOCTER_TABLE_NAME, 'mobile');
        $this->dropColumn(self::DOCTER_TABLE_NAME, 'image_schedule_th');
        $this->addColumn(self::DOCTER_TABLE_NAME, 'image_schedule_en', $this->string());
    }
}

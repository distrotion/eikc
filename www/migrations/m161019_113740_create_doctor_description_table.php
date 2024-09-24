<?php

class m161019_113740_create_doctor_description_table extends \yii\db\Migration
{
    const DOCTOR_DESCRIPTION_TABLE_NAME = '{{%doctor_description}}';
    const DOCTOR_TABLE_NAME = '{{%doctors}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::DOCTOR_DESCRIPTION_TABLE_NAME, [
            'id' => $this->primaryKey(),
            'doctorId' => $this->integer()->notNull(),
            'information_year_th' => $this->string(),
            'information_year_en' => $this->string(),
            'information_th' => $this->string(),
            'information_en' => $this->string(),
            'specialized_training_year_th' => $this->string(),
            'specialized_training_year_en' => $this->string(),
            'specialized_training_th' => $this->string(),
            'specialized_training_en' => $this->string(),
        ], $tableOptions);
        $this->addForeignKey('{{%doctor_description_doctorId}}',
            self::DOCTOR_DESCRIPTION_TABLE_NAME,
            'doctorId',
            self::DOCTOR_TABLE_NAME,
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable(self::DOCTOR_DESCRIPTION_TABLE_NAME);
    }
}
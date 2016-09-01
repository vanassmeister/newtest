<?php

use yii\db\Migration;

class m160901_142808_add_primary_key_to_tb_source extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE tb_source ADD id INT PRIMARY KEY AUTO_INCREMENT FIRST');
    }

    public function down()
    {
        echo "m160901_142808_add_primary_key_to_tb_source cannot be reverted.\n";

        return false;
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

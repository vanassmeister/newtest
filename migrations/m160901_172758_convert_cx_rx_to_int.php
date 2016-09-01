<?php

use yii\db\Migration;

class m160901_172758_convert_cx_rx_to_int extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE tb_source MODIFY cx INT UNSIGNED NOT NULL;');
        $this->execute('ALTER TABLE tb_source MODIFY rx INT UNSIGNED NOT NULL;');
        $this->execute('ALTER TABLE tb_rel MODIFY cx INT UNSIGNED NOT NULL;');
    }

    public function down()
    {
        echo "m160901_172758_convert_cx_rx_to_int cannot be reverted.\n";

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

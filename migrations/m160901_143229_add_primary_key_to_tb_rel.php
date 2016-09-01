<?php

use yii\db\Migration;

class m160901_143229_add_primary_key_to_tb_rel extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE tb_rel ADD id INT PRIMARY KEY AUTO_INCREMENT FIRST');
    }

    public function down()
    {
        echo "m160901_143229_add_primary_key_to_tb_rel cannot be reverted.\n";

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

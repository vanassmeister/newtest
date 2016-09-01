<?php

use yii\db\Migration;

class m160901_140516_add_index_to_tb_rel extends Migration
{
    public function up()
    {
        $this->createIndex('ix_tb_rel_cx', 'tb_rel', 'cx');
    }

    public function down()
    {
        echo "m160901_140516_add_index_to_tb_rel cannot be reverted.\n";

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

<?php

use yii\db\Migration;

class m160901_174558_add_cx_index_to_tb_source extends Migration
{
    public function up()
    {
        $this->createIndex('ix_tb_source_cx', 'tb_source', 'cx');
    }

    public function down()
    {
        echo "m160901_174558_add_cx_index_to_tb_source cannot be reverted.\n";

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

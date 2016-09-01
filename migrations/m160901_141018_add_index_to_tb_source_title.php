<?php

use yii\db\Migration;

class m160901_141018_add_index_to_tb_source_title extends Migration
{
    public function up()
    {
        $this->createIndex('ix_tb_source_title', 'tb_source', 'title');
    }

    public function down()
    {
        echo "m160901_141018_add_index_to_tb_source_title cannot be reverted.\n";

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

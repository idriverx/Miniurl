<?php

use yii\db\Migration;

class m170623_160816_add_counter_to_links extends Migration
{
    public function safeUp()
    {
        $this->addColumn('links', 'counter', $this->integer()->defaultValue(0));
    }

    public function safeDown()
    {
        $this->dropColumn('links', 'counter');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170623_160816_add_counter_to_links cannot be reverted.\n";

        return false;
    }
    */
}

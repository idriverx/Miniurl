<?php

use yii\db\Migration;

/**
 * Handles the creation of table `info`.
 */
class m170624_094603_create_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('info', [
            'id' => $this->primaryKey(),
            'link_id' => $this->integer(),
            'user_agent' => $this->string(),
            'ip' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('info');
    }
}

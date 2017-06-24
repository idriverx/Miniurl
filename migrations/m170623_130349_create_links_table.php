<?php

use yii\db\Migration;

/**
 * Handles the creation of table `links`.
 */
class m170623_130349_create_links_table extends Migration
{
    
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('links', [
            'id' => $this->primaryKey(),
            'link' => $this->string(),
            'short_url' => $this->string(),
            'date' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('links');
    }
}

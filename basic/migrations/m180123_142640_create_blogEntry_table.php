<?php

use yii\db\Migration;

/**
 * Handles the creation of table `blogEntry`.
 */
class m180123_142640_create_blogEntry_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blogEntry', [
            'id' => $this->primaryKey(),
            'viewed' => $this->integer(),
            'title' => $this->string(255),
            'preview' => $this->string(200),
            'body' => $this->binary(),
            'user_id' => $this->integer(),
            'date' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('blogEntry');
    }
}

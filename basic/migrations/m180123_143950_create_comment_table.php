<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180123_143950_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'text' => $this->string(255),
            'blogEntry_id' => $this->integer(),
            'date' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comment');
    }
}

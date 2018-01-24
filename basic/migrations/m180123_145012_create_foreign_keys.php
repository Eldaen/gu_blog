<?php

use yii\db\Migration;

/**
 * Class m180123_145012_create_foreign_keys
 */
class m180123_145012_create_foreign_keys extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_user_id', 'blogEntry', 'user_id', 'users', 'id');
        $this->addForeignKey('fk_blogEntry_id', 'comment', 'blogEntry_id', 'blogEntry', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_id', 'blogEntry');
        $this->dropForeignKey('fk_blogEntry_id', 'comment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180123_145012_create_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m210427_220223_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512),
            'body' => $this->text(),
            'post_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
        ]);
        $this->addForeignKey('FK_COMMENT_USER_CREATED_BY', '{{%comment}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('FK_COMMENT_POST_POST_ID', '{{%comment}}', 'post_id', '{{%post}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_COMMENT_USER_CREATED_BY', '{{%comment}}');
        $this->dropForeignKey('FK_COMMENT_POST_POST_ID', '{{%comment}}');
        $this->dropTable('{{%comment}}');
    }
}

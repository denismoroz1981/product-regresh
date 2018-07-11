<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m180628_151305_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'offers_id' => 'integer',
            'comment' => 'string',
            'user' => 'string',
            'isapproved' => 'integer',

            'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',

            //'created_at' => $this->dateTime().' DEFAULT NOW()',

        ],
            'ENGINE=InnoDB', 'CHARACTER SET=utf8','COLLATE=utf8_general_ci'
        );

        // creates index for column `offers_id`
        $this->createIndex(
            'idx-comments_id',
            'comments',
            'offers_id'
        );

        // add foreign key for table `comments`
        $this->addForeignKey(
            'fk-comments_id',
            'comments',
            'offers_id',
            'offers',
            'admin_id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `comments`
        $this->dropForeignKey(
            'fk-comments_id',
            'comments'
        );

        // drops index for column `offers_id`
        $this->dropIndex(
            'idx-comments_id',
            'comments'
        );

        $this->dropTable('comments');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%token}}`.
 */
class m201102_061652_create_token_table extends Migration
{
    public function safeUp(): void
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%token}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'token' => $this->string()->notNull()->unique(),
            'expired_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-token-user_id', '{{%token}}', 'user_id');
        $this->addForeignKey('fk-token-user_id', '{{%token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown(): void
    {
        $this->dropTable('{{%token}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Class m200201_150838_add_user_roles
 */
class m200201_150838_add_user_roles extends Migration
{
    public function safeUp(): void
    {
        $this->batchInsert('{{%auth_items}}', ['type', 'name', 'description'], [
          [1, 'user', 'User'],
          [1, 'admin', 'Admin'],
        ]);
        $this->batchInsert('{{%auth_item_children}}', ['parent', 'child'], [
          ['admin', 'user'],
        ]);
        $this->execute('INSERT INTO {{%auth_assignments}} (item_name, user_id) SELECT \'user\', u.id FROM {{%user}} u ORDER BY u.id');
    }
    public function safeDown(): void
    {
        $this->delete('{{%auth_items}}', ['name' => ['user', 'admin']]);
    }
}

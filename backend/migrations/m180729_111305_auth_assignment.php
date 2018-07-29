<?php

use yii\db\Schema;
use yii\db\Migration;

class m180729_111305_auth_assignment extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
        $this->dropTable('{{%auth_assignment}}');
        $this->createTable(
            '{{%auth_assignment}}',
            [
                'item_name'=> $this->string(64)->notNull(),
                'user_id'=> $this->string(64)->notNull(),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('auth_assignment_user_id_idx','{{%auth_assignment}}',['user_id'],false);
        $this->addPrimaryKey('pk_on_auth_assignment','{{%auth_assignment}}',['item_name','user_id']);
        $this->batchInsert('{{%auth_assignment}}',
            ["item_name", "user_id", "created_at"],
            [
    [
        'item_name' => '',
        'user_id' => '',
        'created_at' => '',
    ],
]            
        );
    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_auth_assignment','{{%auth_assignment}}');
        $this->dropIndex('auth_assignment_user_id_idx', '{{%auth_assignment}}');
        $this->dropTable('{{%auth_assignment}}');
    }
}

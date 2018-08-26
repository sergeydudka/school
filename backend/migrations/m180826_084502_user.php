<?php

use yii\db\Migration;

class m180826_084502_user extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%user}}')) {
            $this->dropTable('{{%user}}');
        }

$this->createTable(
            '{{%user}}',
            [
                'user_id'=> $this->primaryKey(11),
                'username'=> $this->string(255)->notNull(),
                'auth_key'=> $this->string(32)->notNull(),
                'password_hash'=> $this->string(255)->notNull(),
                'password_reset_token'=> $this->string(255)->null()->defaultValue(null),
                'email'=> $this->string(255)->notNull(),
                'status'=> $this->smallInteger(6)->notNull()->defaultValue(10),
                'created_at'=> $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
                'updated_at'=> $this->timestamp()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            ],$tableOptions
        );
        $this->createIndex('username','{{%user}}',['username'],true);
        $this->createIndex('status','{{%user}}',['status'],false);
        $this->createIndex('created_at','{{%user}}',['created_at'],false);
        $this->createIndex('updated_at','{{%user}}',['updated_at'],false);
        $this->createIndex('auth_key','{{%user}}',['auth_key'],false);
        $this->createIndex('password_hash','{{%user}}',['password_hash'],false);
    $this->batchInsert('{{%user}}',
        ["user_id", "username", "auth_key", "password_hash", "password_reset_token", "email", "status", "created_at", "updated_at"],
        [
    [
        'user_id' => '1',
        'username' => 'admin',
        'auth_key' => 'admin',
        'password_hash' => '$2y$13$d932fj8ux/Xwvai68Mct3e3hW1ksk793OHzAA6aP5FBjwANyntTAm',
        'password_reset_token' => 'admin',
        'email' => 'admin@mail.ru',
        'status' => '1',
        'created_at' => '2018-06-24 20:45:42',
        'updated_at' => '2018-07-05 22:25:39',
    ],
]    
        );
    
    }

    public function safeDown()
    {
        $this->dropIndex('username', '{{%user}}');
        $this->dropIndex('status', '{{%user}}');
        $this->dropIndex('created_at', '{{%user}}');
        $this->dropIndex('updated_at', '{{%user}}');
        $this->dropIndex('auth_key', '{{%user}}');
        $this->dropIndex('password_hash', '{{%user}}');
        $this->dropTable('{{%user}}');
    }
}

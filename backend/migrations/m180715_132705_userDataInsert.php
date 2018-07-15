<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132705_userDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
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
        //$this->truncateTable('{{%user}} CASCADE');
    }
}

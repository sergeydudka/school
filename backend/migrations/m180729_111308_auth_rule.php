<?php

use yii\db\Schema;
use yii\db\Migration;

class m180729_111308_auth_rule extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
        $this->dropTable('{{%auth_rule}}');
        $this->createTable(
            '{{%auth_rule}}',
            [
                'name'=> $this->string(64)->notNull(),
                'data'=> $this->binary()->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->addPrimaryKey('pk_on_auth_rule','{{%auth_rule}}',['name']);
        $this->batchInsert('{{%auth_rule}}',
            ["name", "data", "created_at", "updated_at"],
            [
    [
        'name' => '',
        'data' => '',
        'created_at' => '',
        'updated_at' => '',
    ],
]            
        );
    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_auth_rule','{{%auth_rule}}');
        $this->dropTable('{{%auth_rule}}');
    }
}

<?php

use yii\db\Migration;

class m180729_121051_auth_item extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%auth_item}}')) {
            $this->dropTable('{{%auth_item}}');
        }

$this->createTable(
            '{{%auth_item}}',
            [
                'name'=> $this->string(64)->notNull(),
                'type'=> $this->smallInteger(6)->notNull(),
                'description'=> $this->text()->null()->defaultValue(null),
                'rule_name'=> $this->string(64)->null()->defaultValue(null),
                'data'=> $this->binary()->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('rule_name','{{%auth_item}}',['rule_name'],false);
        $this->createIndex('idx-auth_item-type','{{%auth_item}}',['type'],false);
        $this->addPrimaryKey('pk_on_auth_item','{{%auth_item}}',['name']);
        $this->batchInsert('{{%auth_item}}',
            ["name", "type", "description", "rule_name", "data", "created_at", "updated_at"],
            [
    [
        'name' => '',
        'type' => '',
        'description' => '',
        'rule_name' => '',
        'data' => '',
        'created_at' => '',
        'updated_at' => '',
    ],
]            
        );
    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_auth_item','{{%auth_item}}');
        $this->dropIndex('rule_name', '{{%auth_item}}');
        $this->dropIndex('idx-auth_item-type', '{{%auth_item}}');
        $this->dropTable('{{%auth_item}}');
    }
}
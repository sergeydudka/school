<?php

use yii\db\Migration;

class m180804_085208_auth_rule extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%auth_rule}}')) {
            $this->dropTable('{{%auth_rule}}');
        }

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
    
    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_auth_rule','{{%auth_rule}}');
        $this->dropTable('{{%auth_rule}}');
    }
}

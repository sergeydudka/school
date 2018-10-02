<?php

use yii\db\Migration;

class m181002_194245_user_access extends Migration
{

public function init()
{
$this->db = 'db';
parent::init();
}

public function safeUp()
{
$tableOptions = 'ENGINE=InnoDB';

if ($this->getDb()->getTableSchema('{{%user_access}}')) {
$this->dropTable('{{%user_access}}');
}

$this->createTable(
'{{%user_access}}',
[
    'id'=> $this->primaryKey(11),
    'user_group_id'=> $this->integer(11)->null()->defaultValue(null),
    'entity_name'=> $this->string(256)->null()->defaultValue(null),
    'action'=> $this->string(256)->null()->defaultValue(null),
    'created_by'=> $this->integer(11)->null()->defaultValue(null),
    'updated_by'=> $this->integer(11)->null()->defaultValue(null),
    'created_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
    'updated_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
],$tableOptions
);
						            $this->createIndex('user_group_id','{{%user_access}}',['user_group_id'],false);
					            $this->createIndex('entity_name','{{%user_access}}',['entity_name'],false);
					            $this->createIndex('action','{{%user_access}}',['action'],false);
			
}

public function safeDown()
{
						            $this->dropIndex('user_group_id', '{{%user_access}}');
					            $this->dropIndex('entity_name', '{{%user_access}}');
					            $this->dropIndex('action', '{{%user_access}}');
			$this->dropTable('{{%user_access}}');
}
}

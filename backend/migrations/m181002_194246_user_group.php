<?php

use yii\db\Migration;

class m181002_194246_user_group extends Migration
{

public function init()
{
$this->db = 'db';
parent::init();
}

public function safeUp()
{
$tableOptions = 'ENGINE=InnoDB';

if ($this->getDb()->getTableSchema('{{%user_group}}')) {
$this->dropTable('{{%user_group}}');
}

$this->createTable(
'{{%user_group}}',
[
    'user_group_id'=> $this->primaryKey(11),
    'title'=> $this->string(50)->null()->defaultValue(null),
    'created_at'=> $this->timestamp()->null()->defaultValue(null),
    'updated_at'=> $this->timestamp()->null()->defaultValue(null),
    'created_by'=> $this->integer(11)->null()->defaultValue(null),
    'updated_by'=> $this->integer(11)->null()->defaultValue(null),
],$tableOptions
);
					        $this->insert('{{%user_group}}',[
    'user_group_id' => '1',
    'title' => 'Administrators',
    'created_at' => '2018-10-01 20:30:38',
    'updated_at' => '2018-10-01 20:30:39',
    'created_by' => '1',
    'updated_by' => '1',
]);
	
}

public function safeDown()
{
				$this->dropTable('{{%user_group}}');
}
}

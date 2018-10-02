<?php

use yii\db\Migration;

class m181002_194242_migration extends Migration
{

public function init()
{
$this->db = 'db';
parent::init();
}

public function safeUp()
{
$tableOptions = 'ENGINE=InnoDB';

if ($this->getDb()->getTableSchema('{{%migration}}')) {
$this->dropTable('{{%migration}}');
}

$this->createTable(
'{{%migration}}',
[
    'version'=> $this->string(180)->notNull(),
    'apply_time'=> $this->integer(11)->null()->defaultValue(null),
],$tableOptions
);
				    $this->addPrimaryKey('pk_on_migration','{{%migration}}',['version']);
	        $this->insert('{{%migration}}',[
    'version' => 'm000000_000000_base',
    'apply_time' => '1529862076',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm130524_201442_init',
    'apply_time' => '1529862088',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm140506_102106_rbac_init',
    'apply_time' => '1531850029',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm170907_052038_rbac_add_index_on_auth_assignment_user_id',
    'apply_time' => '1531850029',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180624_173721_user',
    'apply_time' => '1529862088',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183049_alias',
    'apply_time' => '1536690906',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183050_alias_relations',
    'apply_time' => '1536690907',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183051_article',
    'apply_time' => '1536690909',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183052_article_category',
    'apply_time' => '1536690910',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183053_article_group',
    'apply_time' => '1536690911',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183058_difficult',
    'apply_time' => '1536690912',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183059_edition',
    'apply_time' => '1536690913',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183101_translation',
    'apply_time' => '1536690913',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183102_user',
    'apply_time' => '1536690914',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180911_183103_Relations',
    'apply_time' => '1536690916',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180916_080530_migration',
    'apply_time' => '1537085217',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180916_080531_translation',
    'apply_time' => '1537085217',
]);
	        $this->insert('{{%migration}}',[
    'version' => 'm180916_080532_user',
    'apply_time' => '1537085218',
]);
	
}

public function safeDown()
{
    $this->dropPrimaryKey('pk_on_migration','{{%migration}}');
				$this->dropTable('{{%migration}}');
}
}

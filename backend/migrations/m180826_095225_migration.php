<?php

use yii\db\Migration;

class m180826_095225_migration extends Migration
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
        
    }

    public function safeDown()
    {
    $this->dropPrimaryKey('pk_on_migration','{{%migration}}');
        $this->dropTable('{{%migration}}');
    }
}

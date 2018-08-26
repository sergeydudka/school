<?php

use yii\db\Migration;

class m180826_095215_alias_relations extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%alias_relations}}')) {
            $this->dropTable('{{%alias_relations}}');
        }

$this->createTable(
            '{{%alias_relations}}',
            [
                'alias_id'=> $this->primaryKey(20),
                'rel_id'=> $this->integer(20)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('alias_id','{{%alias_relations}}',['alias_id'],true);
        $this->createIndex('rel_id','{{%alias_relations}}',['rel_id'],true);
    
    }

    public function safeDown()
    {
        $this->dropIndex('alias_id', '{{%alias_relations}}');
        $this->dropIndex('rel_id', '{{%alias_relations}}');
        $this->dropTable('{{%alias_relations}}');
    }
}

<?php

use yii\db\Migration;

class m180729_121044_alias extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%alias}}')) {
            $this->dropTable('{{%alias}}');
        }

$this->createTable(
            '{{%alias}}',
            [
                'alias_id'=> $this->primaryKey(20),
                'language_id'=> $this->integer(11)->null()->defaultValue(null),
                'ref_id'=> $this->integer(20)->null()->defaultValue(null),
                'ref_model'=> $this->string(256)->null()->defaultValue(null),
                'code'=> $this->string(256)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('code','{{%alias}}',['code','ref_model'],true);
        $this->createIndex('language_id','{{%alias}}',['language_id'],false);
        $this->createIndex('ref_id','{{%alias}}',['ref_id'],false);
        $this->batchInsert('{{%alias}}',
            ["alias_id", "language_id", "ref_id", "ref_model", "code"],
            [
    [
        'alias_id' => '1',
        'language_id' => null,
        'ref_id' => '2',
        'ref_model' => 'modules\\articles\\models\\Article',
        'code' => 'testalias',
    ],
]            
        );
    }

    public function safeDown()
    {
        $this->dropIndex('code', '{{%alias}}');
        $this->dropIndex('language_id', '{{%alias}}');
        $this->dropIndex('ref_id', '{{%alias}}');
        $this->dropTable('{{%alias}}');
    }
}

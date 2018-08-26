<?php

use yii\db\Migration;

class m180826_084426_difficult extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%difficult}}')) {
            $this->dropTable('{{%difficult}}');
        }

$this->createTable(
            '{{%difficult}}',
            [
                'difficult_id'=> $this->primaryKey(11),
                'type'=> "enum('article_group', 'article') NULL DEFAULT NULL",
                'title'=> $this->string(256)->null()->defaultValue(null),
                'sort'=> $this->integer(10)->unsigned()->notNull()->defaultValue(500),
            ],$tableOptions
        );
        $this->createIndex('sort','{{%difficult}}',['sort'],false);
        $this->createIndex('type','{{%difficult}}',['type'],false);
    $this->batchInsert('{{%difficult}}',
        ["difficult_id", "type", "title", "sort"],
        [
    [
        'difficult_id' => '1',
        'type' => 'article_group',
        'title' => 'neewbe',
        'sort' => '0000000100',
    ],
    [
        'difficult_id' => '2',
        'type' => 'article_group',
        'title' => 'normal',
        'sort' => '0000000200',
    ],
    [
        'difficult_id' => '3',
        'type' => 'article_group',
        'title' => 'senior',
        'sort' => '0000000300',
    ],
    [
        'difficult_id' => '4',
        'type' => 'article_group',
        'title' => 'pro',
        'sort' => '0000000400',
    ],
]    
        );
    
    }

    public function safeDown()
    {
        $this->dropIndex('sort', '{{%difficult}}');
        $this->dropIndex('type', '{{%difficult}}');
        $this->dropTable('{{%difficult}}');
    }
}

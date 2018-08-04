<?php

use yii\db\Migration;

class m180804_085202_article_category extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%article_category}}')) {
            $this->dropTable('{{%article_category}}');
        }

$this->createTable(
            '{{%article_category}}',
            [
                'article_category_id'=> $this->primaryKey(11),
                'title'=> $this->string(256)->null()->defaultValue(null),
                'description'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'updated_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->integer(11)->null()->defaultValue(null),
                'updated_by'=> $this->integer(11)->null()->defaultValue(null),
                'alias_id'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('alias_id','{{%article_category}}',['alias_id'],false);
    $this->batchInsert('{{%article_category}}',
        ["article_category_id", "title", "description", "created_at", "updated_at", "created_by", "updated_by", "alias_id"],
        [
    [
        'article_category_id' => '1',
        'title' => 'HTML',
        'description' => '',
        'created_at' => '2018-07-08 14:00:50',
        'updated_at' => '2018-07-08 14:02:03',
        'created_by' => '1',
        'updated_by' => '1',
        'alias_id' => null,
    ],
]    
        );
    
    }

    public function safeDown()
    {
        $this->dropIndex('alias_id', '{{%article_category}}');
        $this->dropTable('{{%article_category}}');
    }
}

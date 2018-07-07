<?php

use yii\db\Schema;
use yii\db\Migration;

class m180707_144939_article extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%article}}',
            [
                'article_id'=> $this->primaryKey(20),
                'title'=> $this->string(512)->null()->defaultValue(null),
                'description'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'updated_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'status'=> "enum('disabled', 'published', 'waiting', 'deleted') NULL DEFAULT 'disabled'",
                'article_group_id'=> $this->integer(11)->notNull()->defaultValue(0),
                'created_by'=> $this->integer(11)->notNull()->defaultValue(0),
                'updated_by'=> $this->integer(11)->notNull()->defaultValue(0),
            ],$tableOptions
        );
        $this->createIndex('title','{{%article}}',['title'],false);
        $this->createIndex('status','{{%article}}',['status'],false);
        $this->createIndex('date_added','{{%article}}',['created_at'],false);
        $this->createIndex('date_update','{{%article}}',['updated_at'],false);
        $this->createIndex('article_group_id','{{%article}}',['article_group_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('title', '{{%article}}');
        $this->dropIndex('status', '{{%article}}');
        $this->dropIndex('date_added', '{{%article}}');
        $this->dropIndex('date_update', '{{%article}}');
        $this->dropIndex('article_group_id', '{{%article}}');
        $this->dropTable('{{%article}}');
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_175944_article extends Migration
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
                'date_added'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'date_update'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'user_id'=> $this->integer(11)->null()->defaultValue(null),
                'status'=> "enum('disabled', 'published', 'waiting') NULL DEFAULT NULL",
                'article_group_id'=> $this->integer(11)->notNull()->defaultValue(0),
            ],$tableOptions
        );
        $this->createIndex('title','{{%article}}',['title'],false);
        $this->createIndex('status','{{%article}}',['status'],false);
        $this->createIndex('user_id','{{%article}}',['user_id'],false);
        $this->createIndex('date_added','{{%article}}',['date_added'],false);
        $this->createIndex('date_update','{{%article}}',['date_update'],false);
        $this->createIndex('article_group_id','{{%article}}',['article_group_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('title', '{{%article}}');
        $this->dropIndex('status', '{{%article}}');
        $this->dropIndex('user_id', '{{%article}}');
        $this->dropIndex('date_added', '{{%article}}');
        $this->dropIndex('date_update', '{{%article}}');
        $this->dropIndex('article_group_id', '{{%article}}');
        $this->dropTable('{{%article}}');
    }
}

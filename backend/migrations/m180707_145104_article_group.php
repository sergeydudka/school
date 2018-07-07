<?php

use yii\db\Schema;
use yii\db\Migration;

class m180707_145104_article_group extends Migration
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
            '{{%article_group}}',
            [
                'article_group_id'=> $this->primaryKey(11),
                'parent_id'=> $this->integer(11)->null()->defaultValue(0),
                'title'=> $this->string(256)->null()->defaultValue(null),
                'description'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'updated_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->integer(20)->null()->defaultValue(0),
                'updated_by'=> $this->integer(20)->null()->defaultValue(0),
            ],$tableOptions
        );
        $this->createIndex('name','{{%article_group}}',['title'],false);
        $this->createIndex('date_added','{{%article_group}}',['created_at'],false);
        $this->createIndex('date_update','{{%article_group}}',['updated_at'],false);
        $this->createIndex('user_id','{{%article_group}}',['created_by'],false);
        $this->createIndex('parent_id','{{%article_group}}',['parent_id'],false);
        $this->createIndex('updated_by','{{%article_group}}',['updated_by'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('name', '{{%article_group}}');
        $this->dropIndex('date_added', '{{%article_group}}');
        $this->dropIndex('date_update', '{{%article_group}}');
        $this->dropIndex('user_id', '{{%article_group}}');
        $this->dropIndex('parent_id', '{{%article_group}}');
        $this->dropIndex('updated_by', '{{%article_group}}');
        $this->dropTable('{{%article_group}}');
    }
}

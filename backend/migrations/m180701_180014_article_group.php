<?php

use yii\db\Schema;
use yii\db\Migration;

class m180701_180014_article_group extends Migration
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
                'name'=> $this->string(256)->null()->defaultValue(null),
                'description'=> $this->text()->null()->defaultValue(null),
                'date_added'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'date_update'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'user_id'=> $this->integer(20)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('name','{{%article_group}}',['name'],false);
        $this->createIndex('date_added','{{%article_group}}',['date_added'],false);
        $this->createIndex('date_update','{{%article_group}}',['date_update'],false);
        $this->createIndex('user_id','{{%article_group}}',['user_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('name', '{{%article_group}}');
        $this->dropIndex('date_added', '{{%article_group}}');
        $this->dropIndex('date_update', '{{%article_group}}');
        $this->dropIndex('user_id', '{{%article_group}}');
        $this->dropTable('{{%article_group}}');
    }
}

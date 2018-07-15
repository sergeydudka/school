<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132409_article_category extends Migration
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
            '{{%article_category}}',
            [
                'article_category_id'=> $this->primaryKey(11),
                'title'=> $this->string(256)->null()->defaultValue(null),
                'description'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'updated_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->integer(11)->null()->defaultValue(null),
                'updated_by'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%article_category}}');
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132511_difficult extends Migration
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
            '{{%difficult}}',
            [
                'difficult_id'=> $this->primaryKey(11),
                'type'=> "enum('article_group', 'article') NULL DEFAULT NULL",
                'title'=> $this->string(256)->null()->defaultValue(null),
                'sort'=> $this->integer(10)->unsigned()->notNull()->defaultValue('0000000500'),
            ],$tableOptions
        );
        $this->createIndex('sort','{{%difficult}}',['sort'],false);
        $this->createIndex('type','{{%difficult}}',['type'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('sort', '{{%difficult}}');
        $this->dropIndex('type', '{{%difficult}}');
        $this->dropTable('{{%difficult}}');
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132614_language extends Migration
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
            '{{%language}}',
            [
                'language_id'=> $this->primaryKey(11),
                'url'=> $this->string(5)->null()->defaultValue(null),
                'code'=> $this->string(50)->null()->defaultValue(null),
                'title'=> $this->string(256)->null()->defaultValue(null),
                'flag'=> $this->string(256)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('code','{{%language}}',['code'],false);
        $this->createIndex('url','{{%language}}',['url'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('code', '{{%language}}');
        $this->dropIndex('url', '{{%language}}');
        $this->dropTable('{{%language}}');
    }
}

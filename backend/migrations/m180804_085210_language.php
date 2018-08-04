<?php

use yii\db\Migration;

class m180804_085210_language extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%language}}')) {
            $this->dropTable('{{%language}}');
        }

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
    $this->batchInsert('{{%language}}',
        ["language_id", "url", "code", "title", "flag"],
        [
    [
        'language_id' => '1',
        'url' => 'en',
        'code' => 'en-US',
        'title' => 'English',
        'flag' => '',
    ],
    [
        'language_id' => '2',
        'url' => 'ru',
        'code' => 'ru-RU',
        'title' => 'Русский',
        'flag' => '',
    ],
    [
        'language_id' => '3',
        'url' => 'ua',
        'code' => 'uk-UA',
        'title' => 'Украинский',
        'flag' => '',
    ],
]    
        );
    
    }

    public function safeDown()
    {
        $this->dropIndex('code', '{{%language}}');
        $this->dropIndex('url', '{{%language}}');
        $this->dropTable('{{%language}}');
    }
}

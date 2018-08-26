<?php

use yii\db\Migration;

class m180826_095153_language extends Migration
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
            $this->insert('{{%language}}',[
    'language_id' => '1',
    'url' => 'ru',
    'code' => 'ru-RU',
    'title' => 'Русский',
    'flag' => 'uploads/ru.png',
]);
            $this->insert('{{%language}}',[
    'language_id' => '2',
    'url' => 'ua',
    'code' => 'uk-UA',
    'title' => 'Украинский',
    'flag' => 'uploads/ua.png',
]);
            $this->insert('{{%language}}',[
    'language_id' => '3',
    'url' => 'en',
    'code' => 'en-US',
    'title' => 'English',
    'flag' => 'uploads/us.png',
]);
        
    }

    public function safeDown()
    {
        $this->dropIndex('code', '{{%language}}');
        $this->dropIndex('url', '{{%language}}');
        $this->dropTable('{{%language}}');
    }
}

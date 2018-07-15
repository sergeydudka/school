<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132622_languageDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
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
        //$this->truncateTable('{{%language}} CASCADE');
    }
}

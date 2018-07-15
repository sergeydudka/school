<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132555_difficultDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%difficult}}',
                           ["difficult_id", "type", "title", "sort"],
                            [
    [
        'difficult_id' => '1',
        'type' => 'article_group',
        'title' => 'neewbe',
        'sort' => '0000000100',
    ],
    [
        'difficult_id' => '2',
        'type' => 'article_group',
        'title' => 'normal',
        'sort' => '0000000200',
    ],
    [
        'difficult_id' => '3',
        'type' => 'article_group',
        'title' => 'senior',
        'sort' => '0000000300',
    ],
    [
        'difficult_id' => '4',
        'type' => 'article_group',
        'title' => 'pro',
        'sort' => '0000000400',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%difficult}} CASCADE');
    }
}

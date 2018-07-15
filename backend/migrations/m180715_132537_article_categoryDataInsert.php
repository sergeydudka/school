<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132537_article_categoryDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%article_category}}',
                           ["article_category_id", "title", "description", "created_at", "updated_at", "created_by", "updated_by"],
                            [
    [
        'article_category_id' => '1',
        'title' => 'HTML',
        'description' => '',
        'created_at' => '2018-07-08 14:00:50',
        'updated_at' => '2018-07-08 14:02:03',
        'created_by' => '1',
        'updated_by' => '1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%article_category}} CASCADE');
    }
}

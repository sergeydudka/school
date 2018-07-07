<?php

use yii\db\Schema;
use yii\db\Migration;

class m180707_145313_article_groupDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%article_group}}',
                           ["article_group_id", "parent_id", "title", "description", "created_at", "updated_at", "created_by", "updated_by"],
                            [
    [
        'article_group_id' => '3',
        'parent_id' => null,
        'title' => 'Введение в HTML',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:51',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '4',
        'parent_id' => null,
        'title' => 'Инструментарий',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:52',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '5',
        'parent_id' => null,
        'title' => 'Теги',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:52',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '6',
        'parent_id' => null,
        'title' => 'Структура HTML-кода',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:52',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '7',
        'parent_id' => null,
        'title' => 'Типы тегов',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:53',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '8',
        'parent_id' => null,
        'title' => 'Значения атрибутов тегов',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:53',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '9',
        'parent_id' => null,
        'title' => 'Текст',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:53',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '10',
        'parent_id' => null,
        'title' => 'Ссылки',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:54',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '11',
        'parent_id' => null,
        'title' => 'Якоря',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:24:54',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '12',
        'parent_id' => null,
        'title' => 'Изображения',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-05 21:20:41',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '13',
        'parent_id' => null,
        'title' => 'Списки',
        'description' => '',
        'created_at' => '2018-07-05 21:21:29',
        'updated_at' => '2018-07-05 21:21:29',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '14',
        'parent_id' => null,
        'title' => 'Таблицы',
        'description' => '',
        'created_at' => '2018-07-05 21:21:39',
        'updated_at' => '2018-07-05 21:21:39',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '15',
        'parent_id' => null,
        'title' => 'Фреймы',
        'description' => '',
        'created_at' => '2018-07-05 21:21:45',
        'updated_at' => '2018-07-05 21:21:45',
        'created_by' => '1',
        'updated_by' => '1',
    ],
    [
        'article_group_id' => '16',
        'parent_id' => null,
        'title' => 'Валидация документов',
        'description' => '',
        'created_at' => '2018-07-05 21:21:54',
        'updated_at' => '2018-07-05 21:21:54',
        'created_by' => '1',
        'updated_by' => '1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%article_group}} CASCADE');
    }
}

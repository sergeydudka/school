<?php

use yii\db\Schema;
use yii\db\Migration;

class m180715_132923_article_groupDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%article_group}}',
                           ["article_group_id", "parent_id", "article_category_id", "title", "description", "created_at", "updated_at", "created_by", "updated_by", "difficult_id"],
                            [
    [
        'article_group_id' => '3',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Введение в HTML',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:33:44',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '4',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Инструментарий',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:33:52',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '5',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Теги',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:33:58',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '6',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Структура HTML-кода',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:35:22',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '7',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Типы тегов',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:35:28',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '8',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Значения атрибутов тегов',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:35:34',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '9',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Текст',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:35:45',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '10',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Ссылки',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:35:50',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '1',
    ],
    [
        'article_group_id' => '11',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Якоря',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:34:39',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '2',
    ],
    [
        'article_group_id' => '12',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Изображения',
        'description' => '',
        'created_at' => '2018-07-05 21:20:41',
        'updated_at' => '2018-07-08 14:34:46',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '2',
    ],
    [
        'article_group_id' => '13',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Списки',
        'description' => '',
        'created_at' => '2018-07-05 21:21:29',
        'updated_at' => '2018-07-08 14:34:52',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '2',
    ],
    [
        'article_group_id' => '14',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Таблицы',
        'description' => '',
        'created_at' => '2018-07-05 21:21:39',
        'updated_at' => '2018-07-08 14:34:59',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '3',
    ],
    [
        'article_group_id' => '15',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Фреймы',
        'description' => '',
        'created_at' => '2018-07-05 21:21:45',
        'updated_at' => '2018-07-08 14:35:05',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '3',
    ],
    [
        'article_group_id' => '16',
        'parent_id' => null,
        'article_category_id' => '1',
        'title' => 'Валидация документов',
        'description' => '',
        'created_at' => '2018-07-05 21:21:54',
        'updated_at' => '2018-07-08 14:35:11',
        'created_by' => '1',
        'updated_by' => '1',
        'difficult_id' => '4',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%article_group}} CASCADE');
    }
}

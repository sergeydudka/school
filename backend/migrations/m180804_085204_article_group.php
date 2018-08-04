<?php

use yii\db\Migration;

class m180804_085204_article_group extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%article_group}}')) {
            $this->dropTable('{{%article_group}}');
        }

$this->createTable(
            '{{%article_group}}',
            [
                'article_group_id'=> $this->primaryKey(11),
                'parent_id'=> $this->integer(11)->null()->defaultValue(0),
                'article_category_id'=> $this->integer(11)->notNull()->defaultValue(0),
                'title'=> $this->string(256)->null()->defaultValue(null),
                'description'=> $this->text()->null()->defaultValue(null),
                'created_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'updated_at'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->integer(20)->null()->defaultValue(0),
                'updated_by'=> $this->integer(20)->null()->defaultValue(0),
                'difficult_id'=> $this->integer(11)->null()->defaultValue(0),
                'required'=> "enum('Y', 'N') NULL DEFAULT 'N'",
            ],$tableOptions
        );
        $this->createIndex('name','{{%article_group}}',['title'],false);
        $this->createIndex('date_added','{{%article_group}}',['created_at'],false);
        $this->createIndex('date_update','{{%article_group}}',['updated_at'],false);
        $this->createIndex('user_id','{{%article_group}}',['created_by'],false);
        $this->createIndex('parent_id','{{%article_group}}',['parent_id'],false);
        $this->createIndex('updated_by','{{%article_group}}',['updated_by'],false);
        $this->createIndex('article_category_id','{{%article_group}}',['article_category_id'],false);
        $this->createIndex('required','{{%article_group}}',['required'],false);
        $this->createIndex('difficult_id','{{%article_group}}',['difficult_id'],false);
    $this->batchInsert('{{%article_group}}',
        ["article_group_id", "parent_id", "article_category_id", "title", "description", "created_at", "updated_at", "created_by", "updated_by", "difficult_id", "required"],
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
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
        'required' => 'N',
    ],
]    
        );
    
    }

    public function safeDown()
    {
        $this->dropIndex('name', '{{%article_group}}');
        $this->dropIndex('date_added', '{{%article_group}}');
        $this->dropIndex('date_update', '{{%article_group}}');
        $this->dropIndex('user_id', '{{%article_group}}');
        $this->dropIndex('parent_id', '{{%article_group}}');
        $this->dropIndex('updated_by', '{{%article_group}}');
        $this->dropIndex('article_category_id', '{{%article_group}}');
        $this->dropIndex('required', '{{%article_group}}');
        $this->dropIndex('difficult_id', '{{%article_group}}');
        $this->dropTable('{{%article_group}}');
    }
}

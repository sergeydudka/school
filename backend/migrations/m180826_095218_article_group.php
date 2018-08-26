<?php

use yii\db\Migration;

class m180826_095218_article_group extends Migration
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
                'alias_id'=> $this->integer(20)->null()->defaultValue(null),
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
        $this->createIndex('alias_id','{{%article_group}}',['alias_id'],false);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '3',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Основы HTML',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:02:15',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '63',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '4',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Инструментарий',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:08:24',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '65',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '5',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Теги',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:08:32',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '66',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '6',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Структура HTML-кода',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:08:37',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '67',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '7',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Типы тегов',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:08:44',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '68',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '8',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Значения атрибутов тегов',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:08:49',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '69',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '9',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Текст',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:08:54',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '70',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '10',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Ссылки',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:08:59',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '1',
    'required' => 'N',
    'alias_id' => '71',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '11',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Якоря',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:09:04',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '2',
    'required' => 'N',
    'alias_id' => '72',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '12',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Изображения',
    'description' => '',
    'created_at' => '2018-07-05 21:20:41',
    'updated_at' => '2018-08-06 21:09:09',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '2',
    'required' => 'N',
    'alias_id' => '73',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '13',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Списки',
    'description' => '',
    'created_at' => '2018-07-05 21:21:29',
    'updated_at' => '2018-08-06 21:10:27',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '2',
    'required' => 'N',
    'alias_id' => '74',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '14',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Таблицы',
    'description' => '',
    'created_at' => '2018-07-05 21:21:39',
    'updated_at' => '2018-08-06 21:10:32',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '3',
    'required' => 'N',
    'alias_id' => '75',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '15',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Фреймы',
    'description' => '',
    'created_at' => '2018-07-05 21:21:45',
    'updated_at' => '2018-08-06 21:10:37',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '3',
    'required' => 'N',
    'alias_id' => '76',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '16',
    'parent_id' => null,
    'article_category_id' => '1',
    'title' => 'Валидация документов',
    'description' => '',
    'created_at' => '2018-07-05 21:21:54',
    'updated_at' => '2018-08-06 21:10:42',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => '4',
    'required' => 'N',
    'alias_id' => '77',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '17',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Введение в CSS',
    'description' => '',
    'created_at' => '2018-08-06 21:24:28',
    'updated_at' => '2018-08-06 21:24:28',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '80',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '18',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Преимущества стилей',
    'description' => '',
    'created_at' => '2018-08-06 21:24:44',
    'updated_at' => '2018-08-06 21:24:44',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '81',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '19',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Способы добавления стилей на страницу',
    'description' => '',
    'created_at' => '2018-08-06 21:24:58',
    'updated_at' => '2018-08-06 21:24:58',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '82',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '20',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Типы носителей',
    'description' => '',
    'created_at' => '2018-08-06 21:25:10',
    'updated_at' => '2018-08-06 21:25:10',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '83',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '21',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Базовый синтаксис CSS',
    'description' => '',
    'created_at' => '2018-08-06 21:25:21',
    'updated_at' => '2018-08-06 21:25:21',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '84',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '22',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Значения стилевых свойств',
    'description' => '',
    'created_at' => '2018-08-06 21:25:36',
    'updated_at' => '2018-08-06 21:25:36',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '85',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '23',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Селекторы тегов',
    'description' => '',
    'created_at' => '2018-08-06 21:25:54',
    'updated_at' => '2018-08-06 21:25:54',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '86',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '24',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Классы',
    'description' => '',
    'created_at' => '2018-08-06 21:26:06',
    'updated_at' => '2018-08-06 21:26:06',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '87',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '25',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Идентификаторы',
    'description' => '',
    'created_at' => '2018-08-06 21:26:17',
    'updated_at' => '2018-08-06 21:26:17',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '88',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '26',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Контекстные селекторы',
    'description' => '',
    'created_at' => '2018-08-06 21:26:27',
    'updated_at' => '2018-08-06 21:26:27',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '89',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '27',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Соседние селекторы',
    'description' => '',
    'created_at' => '2018-08-06 21:26:44',
    'updated_at' => '2018-08-06 21:26:44',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '90',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '28',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Дочерние селекторы',
    'description' => '',
    'created_at' => '2018-08-06 21:26:56',
    'updated_at' => '2018-08-06 21:26:56',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '91',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '29',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Селекторы атрибутов',
    'description' => '',
    'created_at' => '2018-08-06 21:27:07',
    'updated_at' => '2018-08-06 21:27:07',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '92',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '30',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Универсальный селектор',
    'description' => '',
    'created_at' => '2018-08-06 21:27:17',
    'updated_at' => '2018-08-06 21:27:17',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '93',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '31',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Псевдоклассы',
    'description' => '',
    'created_at' => '2018-08-06 21:27:28',
    'updated_at' => '2018-08-06 21:27:28',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '94',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '32',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Псевдоэлементы',
    'description' => '',
    'created_at' => '2018-08-06 21:27:37',
    'updated_at' => '2018-08-06 21:27:37',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '95',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '33',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Группирование',
    'description' => '',
    'created_at' => '2018-08-06 21:27:48',
    'updated_at' => '2018-08-06 21:27:48',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '96',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '34',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Наследование',
    'description' => '',
    'created_at' => '2018-08-06 21:28:02',
    'updated_at' => '2018-08-06 21:28:02',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '97',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '35',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Каскадирование',
    'description' => '',
    'created_at' => '2018-08-06 21:28:15',
    'updated_at' => '2018-08-06 21:28:15',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '98',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '36',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Валидация CSS',
    'description' => '',
    'created_at' => '2018-08-06 21:28:25',
    'updated_at' => '2018-08-06 21:28:25',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '99',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '37',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Идентификаторы и классы',
    'description' => '',
    'created_at' => '2018-08-06 21:28:35',
    'updated_at' => '2018-08-06 21:28:35',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '100',
]);
            $this->insert('{{%article_group}}',[
    'article_group_id' => '38',
    'parent_id' => null,
    'article_category_id' => '0',
    'title' => 'Написание эффективного кода',
    'description' => '',
    'created_at' => '2018-08-06 21:28:44',
    'updated_at' => '2018-08-06 21:28:44',
    'created_by' => '1',
    'updated_by' => '1',
    'difficult_id' => null,
    'required' => 'N',
    'alias_id' => '101',
]);
        
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
        $this->dropIndex('alias_id', '{{%article_group}}');
        $this->dropTable('{{%article_group}}');
    }
}

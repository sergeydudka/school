<?php

use yii\db\Migration;

class m180911_183101_translation extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        if ($this->getDb()->getTableSchema('{{%translation}}')) {
            $this->dropTable('{{%translation}}');
        }

$this->createTable(
            '{{%translation}}',
            [
                'translation_id'=> $this->primaryKey(11),
                'code'=> $this->string(256)->notNull(),
                'category'=> "enum('app', 'common', 'js', 'model') NOT NULL",
                'description'=> $this->string(1024)->null()->defaultValue(null),
                'ru-RU'=> $this->text()->null()->defaultValue(null),
                'uk-UA'=> $this->text()->null()->defaultValue(null),
                'en-US'=> $this->text()->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('code','{{%translation}}',['code'],false);
        $this->createIndex('category','{{%translation}}',['category'],false);
            $this->insert('{{%translation}}',[
    'translation_id' => '1',
    'code' => 'translation_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID перевода',
    'uk-UA' => null,
    'en-US' => 'Translation ID',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '2',
    'code' => 'code',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Символьный код',
    'uk-UA' => null,
    'en-US' => 'Code',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '3',
    'code' => 'category',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Категория',
    'uk-UA' => null,
    'en-US' => 'Category',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '4',
    'code' => 'description',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Описание',
    'uk-UA' => null,
    'en-US' => 'Description',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '5',
    'code' => 'article_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID статьи',
    'uk-UA' => null,
    'en-US' => 'Article ID',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '6',
    'code' => 'title',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Название',
    'uk-UA' => null,
    'en-US' => 'Title',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '7',
    'code' => 'created_at',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Созданно',
    'uk-UA' => null,
    'en-US' => 'Created at',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '8',
    'code' => 'updated_at',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Обновленно',
    'uk-UA' => null,
    'en-US' => 'Updated at',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '9',
    'code' => 'created_by',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Создал',
    'uk-UA' => null,
    'en-US' => 'Created by',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '10',
    'code' => 'updated_by',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Обновил',
    'uk-UA' => null,
    'en-US' => 'Updated by',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '11',
    'code' => 'status',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Статус',
    'uk-UA' => null,
    'en-US' => 'Status',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '12',
    'code' => 'article_group_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID группы статей',
    'uk-UA' => null,
    'en-US' => 'Article group ID',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '13',
    'code' => 'difficult_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID сложности',
    'uk-UA' => null,
    'en-US' => 'Difficult ID',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '14',
    'code' => 'edition_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID эдиции',
    'uk-UA' => null,
    'en-US' => 'Edition ID',
]);
            $this->insert('{{%translation}}',[
    'translation_id' => '15',
    'code' => 'alias_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID алиаса',
    'uk-UA' => null,
    'en-US' => 'Alias ID',
]);
        
    }

    public function safeDown()
    {
        $this->dropIndex('code', '{{%translation}}');
        $this->dropIndex('category', '{{%translation}}');
        $this->dropTable('{{%translation}}');
    }
}

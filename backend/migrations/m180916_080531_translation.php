<?php

use yii\db\Migration;

class m180916_080531_translation extends Migration
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
    'category'=> "enum('yii', 'app', 'common', 'js', 'model') NOT NULL",
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
    'ru-RU' => 'Создано',
    'uk-UA' => null,
    'en-US' => 'Created at',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '8',
    'code' => 'updated_at',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Обновлено',
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
	        $this->insert('{{%translation}}',[
    'translation_id' => '16',
    'code' => '{attribute} cannot be blank.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => '{attribute} cannot be blank.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '17',
    'code' => '{attribute} must be a string.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => '{attribute} must be a string.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '18',
    'code' => '{attribute} must be an integer.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => '{attribute} must be an integer.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '19',
    'code' => '{attribute} should contain at most {max, number} {max, plural, one{character} other{characters}}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => '{attribute} should contain at most {max, number} {max, plural, one{character} other{characters}}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '20',
    'code' => 'not_set',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Не выбранно',
    'uk-UA' => null,
    'en-US' => 'Not set',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '21',
    'code' => 'alias',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Алиас',
    'uk-UA' => null,
    'en-US' => 'Alias',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '22',
    'code' => 'article-category',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Категории статей',
    'uk-UA' => null,
    'en-US' => 'Article category',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '23',
    'code' => 'article',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Статья',
    'uk-UA' => null,
    'en-US' => 'Article',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '24',
    'code' => 'article-group',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Группы статей',
    'uk-UA' => null,
    'en-US' => 'Article group',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '25',
    'code' => 'difficult',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Сложность',
    'uk-UA' => null,
    'en-US' => 'Difficult',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '26',
    'code' => 'edition',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Эдиция',
    'uk-UA' => null,
    'en-US' => 'Edition',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '27',
    'code' => 'config',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Конфигурация',
    'uk-UA' => null,
    'en-US' => 'Config',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '28',
    'code' => 'menu',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Меню',
    'uk-UA' => null,
    'en-US' => 'Menu',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '29',
    'code' => 'translation',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Перевод',
    'uk-UA' => null,
    'en-US' => 'Translation',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '30',
    'code' => 'user',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Пользователь',
    'uk-UA' => null,
    'en-US' => 'User',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '31',
    'code' => 'articles',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Статьи',
    'uk-UA' => null,
    'en-US' => 'Articles',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '32',
    'code' => 'editions',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Эдиции',
    'uk-UA' => null,
    'en-US' => 'Editions',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '33',
    'code' => 'translations',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Переводы',
    'uk-UA' => null,
    'en-US' => 'Translations',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '34',
    'code' => 'users',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Пользователи',
    'uk-UA' => null,
    'en-US' => 'Users',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '35',
    'code' => 'Yii Framework',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '36',
    'code' => 'Powered by {yii}',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '37',
    'code' => 'Page not found.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '38',
    'code' => '{attribute} must be either "{true}" or "{false}".',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '39',
    'code' => '{attribute} is invalid.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	
}

public function safeDown()
{
						            $this->dropIndex('code', '{{%translation}}');
					            $this->dropIndex('category', '{{%translation}}');
			$this->dropTable('{{%translation}}');
}
}

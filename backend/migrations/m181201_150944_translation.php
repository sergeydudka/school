<?php

use yii\db\Migration;

class m181201_150944_translation extends Migration
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
    'description' => '',
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
    'ru-RU' => '{attribute} не может быть пустым.',
    'uk-UA' => null,
    'en-US' => '{attribute} cannot be blank.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '17',
    'code' => '{attribute} must be a string.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '{attribute} должен быть строкой.',
    'uk-UA' => null,
    'en-US' => '{attribute} must be a string.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '18',
    'code' => '{attribute} must be an integer.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '{attribute} должен быть целым числом.',
    'uk-UA' => null,
    'en-US' => '{attribute} must be an integer.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '19',
    'code' => '{attribute} should contain at most {max, number} {max, plural, one{character} other{characters}}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '{attribute} должен содержать {max, number} {max, plural, one{character} other{characters}}.',
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
    'ru-RU' => 'Yii Framework',
    'uk-UA' => null,
    'en-US' => 'Yii Framework',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '36',
    'code' => 'Powered by {yii}',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Powered by {yii}',
    'uk-UA' => null,
    'en-US' => 'Powered by {yii}',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '37',
    'code' => 'Page not found.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Страница не найдена',
    'uk-UA' => null,
    'en-US' => 'Page not found.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '38',
    'code' => '{attribute} must be either "{true}" or "{false}".',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '{attribute} должен быть "{true}" или "{false}".',
    'uk-UA' => null,
    'en-US' => '{attribute} must be either "{true}" or "{false}".',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '39',
    'code' => '{attribute} is invalid.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Не коректный {attribute}.',
    'uk-UA' => null,
    'en-US' => '{attribute} is invalid.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '40',
    'code' => 'No results found.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Нет результата.',
    'uk-UA' => null,
    'en-US' => 'No results found.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '41',
    'code' => 'No',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Нет',
    'uk-UA' => null,
    'en-US' => 'No',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '42',
    'code' => 'Yes',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Да',
    'uk-UA' => null,
    'en-US' => 'Yes',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '43',
    'code' => '(not set)',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Не выбранно',
    'uk-UA' => null,
    'en-US' => '(not set)',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '44',
    'code' => 'Total <b>{count, number}</b> {count, plural, one{item} other{items}}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Всего <b>{count, number}</b> {count, plural, one{item} other{items}}.',
    'uk-UA' => null,
    'en-US' => 'Total <b>{count, number}</b> {count, plural, one{item} other{items}}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '45',
    'code' => 'Missing required parameters: {params}',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Нехватает обязательных параметров: {params} ',
    'uk-UA' => null,
    'en-US' => 'Missing required parameters: {params}',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '46',
    'code' => 'File upload failed.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Неудачная попытка загрузки файла.',
    'uk-UA' => null,
    'en-US' => 'File upload failed.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '47',
    'code' => 'Please upload a file.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Загрузите файл.',
    'uk-UA' => null,
    'en-US' => 'Please upload a file.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '48',
    'code' => 'You can upload at most {limit, number} {limit, plural, one{file} other{files}}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '2',
    'uk-UA' => null,
    'en-US' => 'You can upload at most {limit, number} {limit, plural, one{file} other{files}}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '49',
    'code' => 'You should upload at least {limit, number} {limit, plural, one{file} other{files}}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '3',
    'uk-UA' => null,
    'en-US' => 'You should upload at least {limit, number} {limit, plural, one{file} other{files}}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '50',
    'code' => 'Only files with these extensions are allowed: {extensions}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '4',
    'uk-UA' => null,
    'en-US' => 'Only files with these extensions are allowed: {extensions}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '51',
    'code' => 'The file "{file}" is too big. Its size cannot exceed {formattedLimit}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Файл "{file}"очень большой. Его размер не может превышать {formattedLimit}.',
    'uk-UA' => null,
    'en-US' => 'The file "{file}" is too big. Its size cannot exceed {formattedLimit}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '52',
    'code' => 'The file "{file}" is too small. Its size cannot be smaller than {formattedLimit}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Файл "{file}" очень маленький. Его размер не может быть меньше {formattedLimit}.',
    'uk-UA' => null,
    'en-US' => 'The file "{file}" is too small. Its size cannot be smaller than {formattedLimit}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '53',
    'code' => 'Only files with these MIME types are allowed: {mimeTypes}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Разрешены файлы типа: {mimeTypes}.',
    'uk-UA' => null,
    'en-US' => 'Only files with these MIME types are allowed: {mimeTypes}.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '54',
    'code' => 'Home',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Домой',
    'uk-UA' => null,
    'en-US' => 'Home',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '55',
    'code' => 'The format of {filter} is invalid.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Формат фильтра {filter} не корректный.',
    'uk-UA' => null,
    'en-US' => 'The format of {filter} is invalid.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '56',
    'code' => 'Operator "{operator}" requires multiple operands.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Оператору "{operator}" требуется несколько операндов.',
    'uk-UA' => null,
    'en-US' => 'Operator "{operator}" requires multiple operands.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '57',
    'code' => 'Unknown filter attribute "{attribute}"',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Не известный аттрибут фильтра "{attribute}"',
    'uk-UA' => null,
    'en-US' => 'Unknown filter attribute "{attribute}"',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '58',
    'code' => 'Condition for "{attribute}" should be either a value or valid operator specification.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Условия для "{attribute}" должно соответствовать спецификации.',
    'uk-UA' => null,
    'en-US' => 'Condition for "{attribute}" should be either a value or valid operator specification.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '59',
    'code' => 'Operator "{operator}" must be used with a search attribute.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => 'Оператор "{operator}"должен быть использован с другим видом аттрибута.',
    'uk-UA' => null,
    'en-US' => 'Operator "{operator}" must be used with a search attribute.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '60',
    'code' => '"{attribute}" does not support operator "{operator}".',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '"{attribute}" не поддерживает оператор "{operator}".',
    'uk-UA' => null,
    'en-US' => '"{attribute}" does not support operator "{operator}".',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '61',
    'code' => 'parent_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID родителя',
    'uk-UA' => null,
    'en-US' => 'Parent ID',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '62',
    'code' => 'article_category_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID категории статей',
    'uk-UA' => null,
    'en-US' => 'Article category ID',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '63',
    'code' => 'required',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Обязательно',
    'uk-UA' => null,
    'en-US' => 'Required',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '64',
    'code' => 'type',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Тип',
    'uk-UA' => null,
    'en-US' => 'Type',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '65',
    'code' => 'sort',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Сортировка',
    'uk-UA' => null,
    'en-US' => 'Sort',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '66',
    'code' => 'language_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID языка',
    'uk-UA' => null,
    'en-US' => 'Language ID',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '67',
    'code' => 'ref_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID связи',
    'uk-UA' => null,
    'en-US' => 'Reference ID',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '68',
    'code' => 'ref_model',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Связанная модель',
    'uk-UA' => null,
    'en-US' => 'Reference model',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '69',
    'code' => 'language',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Язык',
    'uk-UA' => null,
    'en-US' => 'Language',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '70',
    'code' => 'url',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Урл',
    'uk-UA' => null,
    'en-US' => 'Url',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '71',
    'code' => 'flag',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Флаг',
    'uk-UA' => null,
    'en-US' => 'Flag',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '72',
    'code' => 'user_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID пользователя',
    'uk-UA' => null,
    'en-US' => 'User ID',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '73',
    'code' => 'username',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Имя пользователя',
    'uk-UA' => null,
    'en-US' => 'Username',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '74',
    'code' => 'auth_key',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Ключ авторизации',
    'uk-UA' => null,
    'en-US' => 'Authentification key',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '75',
    'code' => 'password_hash',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Хеш пароля',
    'uk-UA' => null,
    'en-US' => 'Password hash',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '76',
    'code' => 'password_reset_token',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Код для сбрасывания пароля',
    'uk-UA' => null,
    'en-US' => 'Password reset token',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '77',
    'code' => 'email',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Почта',
    'uk-UA' => null,
    'en-US' => 'E-mail',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '78',
    'code' => '{attribute} "{value}" has already been taken.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => '{attribute} "{value} " уже занят.',
    'uk-UA' => null,
    'en-US' => '{attribute} "{value}" has already been taken.',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '79',
    'code' => 'user_group_id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID группы пользователей',
    'uk-UA' => null,
    'en-US' => 'User group ID',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '80',
    'code' => 'main',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Главный',
    'uk-UA' => null,
    'en-US' => 'Main',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '81',
    'code' => 'user-group',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Группа пользователей',
    'uk-UA' => null,
    'en-US' => 'User group',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '82',
    'code' => 'user-access',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Права доступа пользователя',
    'uk-UA' => null,
    'en-US' => 'User access',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '83',
    'code' => 'incorrect_username_or_password',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Неверное имя пользователя или пароль!',
    'uk-UA' => null,
    'en-US' => 'Incorrect username or password!',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '84',
    'code' => 'id',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'ID',
    'uk-UA' => 'ID',
    'en-US' => 'ID',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '85',
    'code' => 'entity_name',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Название сущности',
    'uk-UA' => null,
    'en-US' => 'Entityt name',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '86',
    'code' => 'action',
    'category' => 'model',
    'description' => null,
    'ru-RU' => 'Действие',
    'uk-UA' => null,
    'en-US' => 'Action',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '87',
    'code' => 'access_denied_for_action',
    'category' => 'app',
    'description' => null,
    'ru-RU' => 'Доступ запрещен для действия',
    'uk-UA' => null,
    'en-US' => 'Acces denien for action',
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '88',
    'code' => 'auth',
    'category' => 'app',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '89',
    'code' => 'incorrect_username_or_password',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '90',
    'code' => 'Showing <b>{begin, number}-{end, number}</b> of <b>{totalCount, number}</b> {totalCount, plural, one{item} other{items}}.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '91',
    'code' => 'An internal server error occurred.',
    'category' => 'yii',
    'description' => null,
    'ru-RU' => null,
    'uk-UA' => null,
    'en-US' => null,
]);
	        $this->insert('{{%translation}}',[
    'translation_id' => '92',
    'code' => 'Error',
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

<?php

use yii\db\Migration;

class m180916_080529_edition extends Migration
{

public function init()
{
$this->db = 'db';
parent::init();
}

public function safeUp()
{
$tableOptions = 'ENGINE=InnoDB';

if ($this->getDb()->getTableSchema('{{%edition}}')) {
$this->dropTable('{{%edition}}');
}

$this->createTable(
'{{%edition}}',
[
    'edition_id'=> $this->primaryKey(11),
    'language'=> $this->string(8)->notNull()->defaultValue('0'),
    'url'=> $this->string(5)->null()->defaultValue(null),
    'code'=> $this->string(50)->null()->defaultValue(null),
    'title'=> $this->string(256)->null()->defaultValue(null),
    'flag'=> $this->string(256)->null()->defaultValue(null),
],$tableOptions
);
						            $this->createIndex('code','{{%edition}}',['code'],false);
					            $this->createIndex('url','{{%edition}}',['url'],false);
					            $this->createIndex('language','{{%edition}}',['language'],false);
				        $this->insert('{{%edition}}',[
    'edition_id' => '1',
    'language' => '0',
    'url' => 'ru',
    'code' => 'ru-RU',
    'title' => 'Русский',
    'flag' => 'uploads/ru.png',
]);
	        $this->insert('{{%edition}}',[
    'edition_id' => '2',
    'language' => '0',
    'url' => 'ua',
    'code' => 'uk-UA',
    'title' => 'Украинский',
    'flag' => 'uploads/ua.png',
]);
	        $this->insert('{{%edition}}',[
    'edition_id' => '3',
    'language' => '0',
    'url' => 'en',
    'code' => 'en-US',
    'title' => 'English',
    'flag' => 'uploads/us.png',
]);
	
}

public function safeDown()
{
						            $this->dropIndex('code', '{{%edition}}');
					            $this->dropIndex('url', '{{%edition}}');
					            $this->dropIndex('language', '{{%edition}}');
			$this->dropTable('{{%edition}}');
}
}

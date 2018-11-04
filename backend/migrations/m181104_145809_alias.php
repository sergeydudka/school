<?php

use yii\db\Migration;

class m181104_145809_alias extends Migration
{

public function init()
{
$this->db = 'db';
parent::init();
}

public function safeUp()
{
$tableOptions = 'ENGINE=InnoDB';

if ($this->getDb()->getTableSchema('{{%alias}}')) {
$this->dropTable('{{%alias}}');
}

$this->createTable(
'{{%alias}}',
[
    'alias_id'=> $this->primaryKey(20),
    'edition_id'=> $this->integer(11)->null()->defaultValue(null),
    'ref_id'=> $this->integer(20)->null()->defaultValue(null),
    'ref_model'=> $this->string(256)->null()->defaultValue(null),
    'code'=> $this->string(256)->null()->defaultValue(null),
],$tableOptions
);
						            $this->createIndex('code','{{%alias}}',['code','ref_model'],true);
					            $this->createIndex('language_id','{{%alias}}',['edition_id'],false);
					            $this->createIndex('ref_id','{{%alias}}',['ref_id'],false);
				        $this->insert('{{%alias}}',[
    'alias_id' => '1',
    'edition_id' => null,
    'ref_id' => '10',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tegi-verhnego-urovnya',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '2',
    'edition_id' => null,
    'ref_id' => '2',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'vvedenie-v-html',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '3',
    'edition_id' => null,
    'ref_id' => '3',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'instrumentariy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '4',
    'edition_id' => null,
    'ref_id' => '4',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tegi',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '5',
    'edition_id' => null,
    'ref_id' => '5',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'parnye-tegi',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '6',
    'edition_id' => null,
    'ref_id' => '6',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'pravila-primeneniya-tegov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '7',
    'edition_id' => null,
    'ref_id' => '7',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'atributy-tegov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '8',
    'edition_id' => null,
    'ref_id' => '8',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'struktura-html-koda',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '9',
    'edition_id' => null,
    'ref_id' => '9',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tipy-tegov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '10',
    'edition_id' => null,
    'ref_id' => '11',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tegi-zagolovka-dokumenta',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '11',
    'edition_id' => null,
    'ref_id' => '12',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'blochnye-elementy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '12',
    'edition_id' => null,
    'ref_id' => '13',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'strochnye-elementy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '13',
    'edition_id' => null,
    'ref_id' => '14',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'universalnye-elementy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '14',
    'edition_id' => null,
    'ref_id' => '15',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tegi-dlya-spiskov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '15',
    'edition_id' => null,
    'ref_id' => '16',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tegi-dlya-tablic',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '16',
    'edition_id' => null,
    'ref_id' => '17',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tegi-dlya-freymov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '17',
    'edition_id' => null,
    'ref_id' => '18',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'znacheniya-atributov-tegov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '18',
    'edition_id' => null,
    'ref_id' => '19',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'cvet',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '19',
    'edition_id' => null,
    'ref_id' => '20',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'razmer',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '20',
    'edition_id' => null,
    'ref_id' => '21',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'adres',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '21',
    'edition_id' => null,
    'ref_id' => '22',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tekst',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '22',
    'edition_id' => null,
    'ref_id' => '23',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'abzacy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '23',
    'edition_id' => null,
    'ref_id' => '24',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'zagolovki',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '24',
    'edition_id' => null,
    'ref_id' => '25',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'vyravnivanie-teksta',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '25',
    'edition_id' => null,
    'ref_id' => '26',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'nachertanie',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '26',
    'edition_id' => null,
    'ref_id' => '27',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'verhniy-i-nizhniy-indeksy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '27',
    'edition_id' => null,
    'ref_id' => '28',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'specsimvoly',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '28',
    'edition_id' => null,
    'ref_id' => '29',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'ssylki',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '29',
    'edition_id' => null,
    'ref_id' => '30',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'absolyutnye-i-otnositelnye-ssylki',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '30',
    'edition_id' => null,
    'ref_id' => '31',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'vidy-ssylok',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '31',
    'edition_id' => null,
    'ref_id' => '32',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'pravila-vlozheniy-dlya-tega-a',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '32',
    'edition_id' => null,
    'ref_id' => '33',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'atributy-ssylok',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '33',
    'edition_id' => null,
    'ref_id' => '34',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'ssylka-na-adres-elektronnoy-pochty',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '34',
    'edition_id' => null,
    'ref_id' => '36',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'izobrazheniya',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '35',
    'edition_id' => null,
    'ref_id' => '37',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'formaty-faylov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '36',
    'edition_id' => null,
    'ref_id' => '35',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'yakorya',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '37',
    'edition_id' => null,
    'ref_id' => '38',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'dobavlenie-risunka',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '38',
    'edition_id' => null,
    'ref_id' => '39',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'alternativnyy-tekst',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '39',
    'edition_id' => null,
    'ref_id' => '40',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'izmenenie-razmerov-risunka',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '40',
    'edition_id' => null,
    'ref_id' => '41',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'spiski',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '41',
    'edition_id' => null,
    'ref_id' => '42',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'markirovannyy-spisok',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '42',
    'edition_id' => null,
    'ref_id' => '43',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'numerovannyy-spisok',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '43',
    'edition_id' => null,
    'ref_id' => '44',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'spisok-opredeleniy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '44',
    'edition_id' => null,
    'ref_id' => '45',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tablicy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '45',
    'edition_id' => null,
    'ref_id' => '46',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'atributy-tega-table',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '46',
    'edition_id' => null,
    'ref_id' => '47',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'atributy-tega-td',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '47',
    'edition_id' => null,
    'ref_id' => '48',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'osobennosti-tablic',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '48',
    'edition_id' => null,
    'ref_id' => '49',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'vyravnivanie-tablic',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '49',
    'edition_id' => null,
    'ref_id' => '50',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'obedinenie-yacheek',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '50',
    'edition_id' => null,
    'ref_id' => '51',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'vlozhennye-tablicy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '51',
    'edition_id' => null,
    'ref_id' => '52',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'zagolovok-tablicy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '52',
    'edition_id' => null,
    'ref_id' => '53',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'freymy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '53',
    'edition_id' => null,
    'ref_id' => '54',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'sozdanie-freymov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '54',
    'edition_id' => null,
    'ref_id' => '55',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'ssylki-vo-freymah',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '55',
    'edition_id' => null,
    'ref_id' => '56',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'granicy-mezhdu-freymami',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '56',
    'edition_id' => null,
    'ref_id' => '57',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'izmenenie-razmerov-freymov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '57',
    'edition_id' => null,
    'ref_id' => '58',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'polosy-prokrutki-freyma',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '58',
    'edition_id' => null,
    'ref_id' => '59',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'plavayushchie-freymy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '59',
    'edition_id' => null,
    'ref_id' => '60',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'validaciya-dokumentov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '60',
    'edition_id' => null,
    'ref_id' => '61',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'proverka-dannyh-na-validnost',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '61',
    'edition_id' => null,
    'ref_id' => '62',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'napisanie-korrektnogo-koda',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '62',
    'edition_id' => null,
    'ref_id' => '63',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'ispravlenie-oshibok',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '63',
    'edition_id' => null,
    'ref_id' => '3',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'osnovy-html',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '65',
    'edition_id' => null,
    'ref_id' => '4',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'instrumentariy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '66',
    'edition_id' => null,
    'ref_id' => '5',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'tegi',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '67',
    'edition_id' => null,
    'ref_id' => '6',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'struktura-html-koda',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '68',
    'edition_id' => null,
    'ref_id' => '7',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'tipy-tegov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '69',
    'edition_id' => null,
    'ref_id' => '8',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'znacheniya-atributov-tegov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '70',
    'edition_id' => null,
    'ref_id' => '9',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'tekst',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '71',
    'edition_id' => null,
    'ref_id' => '10',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'ssylki',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '72',
    'edition_id' => null,
    'ref_id' => '11',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'yakorya',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '73',
    'edition_id' => null,
    'ref_id' => '12',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'izobrazheniya',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '74',
    'edition_id' => null,
    'ref_id' => '13',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'spiski',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '75',
    'edition_id' => null,
    'ref_id' => '14',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'tablicy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '76',
    'edition_id' => null,
    'ref_id' => '15',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'freymy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '77',
    'edition_id' => null,
    'ref_id' => '16',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
    'code' => 'validaciya-dokumentov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '78',
    'edition_id' => null,
    'ref_id' => '1',
    'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleCategory',
    'code' => 'html',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '110',
    'edition_id' => null,
    'ref_id' => '68',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'bazovyy-sintaksis-css',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '111',
    'edition_id' => null,
    'ref_id' => '67',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'tipy-nositeley',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '112',
    'edition_id' => null,
    'ref_id' => '66',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'sposoby-dobavleniya-stiley-na-stranicu',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '113',
    'edition_id' => null,
    'ref_id' => '65',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'preimushchestva-stiley',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '114',
    'edition_id' => null,
    'ref_id' => '64',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'vvedenie-v-css',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '115',
    'edition_id' => null,
    'ref_id' => '69',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'znacheniya-stilevyh-svoystv',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '116',
    'edition_id' => null,
    'ref_id' => '70',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'selektory-tegov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '117',
    'edition_id' => null,
    'ref_id' => '71',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'klassy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '118',
    'edition_id' => null,
    'ref_id' => '72',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'identifikatory',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '119',
    'edition_id' => null,
    'ref_id' => '73',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'kontekstnye-selektory',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '120',
    'edition_id' => null,
    'ref_id' => '74',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'sosednie-selektory',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '121',
    'edition_id' => null,
    'ref_id' => '75',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'dochernie-selektory',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '123',
    'edition_id' => null,
    'ref_id' => '76',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'selektory-atributov',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '124',
    'edition_id' => null,
    'ref_id' => '77',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'universalnyy-selektor',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '125',
    'edition_id' => null,
    'ref_id' => '78',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'psevdoklassy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '126',
    'edition_id' => null,
    'ref_id' => '79',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'psevdoelementy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '127',
    'edition_id' => null,
    'ref_id' => '80',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'gruppirovanie',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '128',
    'edition_id' => null,
    'ref_id' => '81',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'nasledovanie',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '129',
    'edition_id' => null,
    'ref_id' => '82',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'kaskadirovanie',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '130',
    'edition_id' => null,
    'ref_id' => '83',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'validaciya-css',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '131',
    'edition_id' => null,
    'ref_id' => '84',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'identifikatory-i-klassy',
]);
	        $this->insert('{{%alias}}',[
    'alias_id' => '132',
    'edition_id' => null,
    'ref_id' => '85',
    'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
    'code' => 'napisanie-effektivnogo-koda',
]);
	
}

public function safeDown()
{
						            $this->dropIndex('code', '{{%alias}}');
					            $this->dropIndex('language_id', '{{%alias}}');
					            $this->dropIndex('ref_id', '{{%alias}}');
			$this->dropTable('{{%alias}}');
}
}

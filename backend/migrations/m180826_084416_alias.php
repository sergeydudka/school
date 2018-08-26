<?php

use yii\db\Migration;

class m180826_084416_alias extends Migration
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
                'language_id'=> $this->integer(11)->null()->defaultValue(null),
                'ref_id'=> $this->integer(20)->null()->defaultValue(null),
                'ref_model'=> $this->string(256)->null()->defaultValue(null),
                'code'=> $this->string(256)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('code','{{%alias}}',['code','ref_model'],true);
        $this->createIndex('language_id','{{%alias}}',['language_id'],false);
        $this->createIndex('ref_id','{{%alias}}',['ref_id'],false);
    $this->batchInsert('{{%alias}}',
        ["alias_id", "language_id", "ref_id", "ref_model", "code"],
        [
    [
        'alias_id' => '1',
        'language_id' => null,
        'ref_id' => '10',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tegi-verhnego-urovnya',
    ],
    [
        'alias_id' => '2',
        'language_id' => null,
        'ref_id' => '2',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'vvedenie-v-html',
    ],
    [
        'alias_id' => '3',
        'language_id' => null,
        'ref_id' => '3',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'instrumentariy',
    ],
    [
        'alias_id' => '4',
        'language_id' => null,
        'ref_id' => '4',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tegi',
    ],
    [
        'alias_id' => '5',
        'language_id' => null,
        'ref_id' => '5',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'parnye-tegi',
    ],
    [
        'alias_id' => '6',
        'language_id' => null,
        'ref_id' => '6',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'pravila-primeneniya-tegov',
    ],
    [
        'alias_id' => '7',
        'language_id' => null,
        'ref_id' => '7',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'atributy-tegov',
    ],
    [
        'alias_id' => '8',
        'language_id' => null,
        'ref_id' => '8',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'struktura-html-koda',
    ],
    [
        'alias_id' => '9',
        'language_id' => null,
        'ref_id' => '9',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tipy-tegov',
    ],
    [
        'alias_id' => '10',
        'language_id' => null,
        'ref_id' => '11',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tegi-zagolovka-dokumenta',
    ],
    [
        'alias_id' => '11',
        'language_id' => null,
        'ref_id' => '12',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'blochnye-elementy',
    ],
    [
        'alias_id' => '12',
        'language_id' => null,
        'ref_id' => '13',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'strochnye-elementy',
    ],
    [
        'alias_id' => '13',
        'language_id' => null,
        'ref_id' => '14',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'universalnye-elementy',
    ],
    [
        'alias_id' => '14',
        'language_id' => null,
        'ref_id' => '15',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tegi-dlya-spiskov',
    ],
    [
        'alias_id' => '15',
        'language_id' => null,
        'ref_id' => '16',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tegi-dlya-tablic',
    ],
    [
        'alias_id' => '16',
        'language_id' => null,
        'ref_id' => '17',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tegi-dlya-freymov',
    ],
    [
        'alias_id' => '17',
        'language_id' => null,
        'ref_id' => '18',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'znacheniya-atributov-tegov',
    ],
    [
        'alias_id' => '18',
        'language_id' => null,
        'ref_id' => '19',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'cvet',
    ],
    [
        'alias_id' => '19',
        'language_id' => null,
        'ref_id' => '20',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'razmer',
    ],
    [
        'alias_id' => '20',
        'language_id' => null,
        'ref_id' => '21',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'adres',
    ],
    [
        'alias_id' => '21',
        'language_id' => null,
        'ref_id' => '22',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tekst',
    ],
    [
        'alias_id' => '22',
        'language_id' => null,
        'ref_id' => '23',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'abzacy',
    ],
    [
        'alias_id' => '23',
        'language_id' => null,
        'ref_id' => '24',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'zagolovki',
    ],
    [
        'alias_id' => '24',
        'language_id' => null,
        'ref_id' => '25',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'vyravnivanie-teksta',
    ],
    [
        'alias_id' => '25',
        'language_id' => null,
        'ref_id' => '26',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'nachertanie',
    ],
    [
        'alias_id' => '26',
        'language_id' => null,
        'ref_id' => '27',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'verhniy-i-nizhniy-indeksy',
    ],
    [
        'alias_id' => '27',
        'language_id' => null,
        'ref_id' => '28',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'specsimvoly',
    ],
    [
        'alias_id' => '28',
        'language_id' => null,
        'ref_id' => '29',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'ssylki',
    ],
    [
        'alias_id' => '29',
        'language_id' => null,
        'ref_id' => '30',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'absolyutnye-i-otnositelnye-ssylki',
    ],
    [
        'alias_id' => '30',
        'language_id' => null,
        'ref_id' => '31',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'vidy-ssylok',
    ],
    [
        'alias_id' => '31',
        'language_id' => null,
        'ref_id' => '32',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'pravila-vlozheniy-dlya-tega-a',
    ],
    [
        'alias_id' => '32',
        'language_id' => null,
        'ref_id' => '33',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'atributy-ssylok',
    ],
    [
        'alias_id' => '33',
        'language_id' => null,
        'ref_id' => '34',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'ssylka-na-adres-elektronnoy-pochty',
    ],
    [
        'alias_id' => '34',
        'language_id' => null,
        'ref_id' => '36',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'izobrazheniya',
    ],
    [
        'alias_id' => '35',
        'language_id' => null,
        'ref_id' => '37',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'formaty-faylov',
    ],
    [
        'alias_id' => '36',
        'language_id' => null,
        'ref_id' => '35',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'yakorya',
    ],
    [
        'alias_id' => '37',
        'language_id' => null,
        'ref_id' => '38',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'dobavlenie-risunka',
    ],
    [
        'alias_id' => '38',
        'language_id' => null,
        'ref_id' => '39',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'alternativnyy-tekst',
    ],
    [
        'alias_id' => '39',
        'language_id' => null,
        'ref_id' => '40',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'izmenenie-razmerov-risunka',
    ],
    [
        'alias_id' => '40',
        'language_id' => null,
        'ref_id' => '41',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'spiski',
    ],
    [
        'alias_id' => '41',
        'language_id' => null,
        'ref_id' => '42',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'markirovannyy-spisok',
    ],
    [
        'alias_id' => '42',
        'language_id' => null,
        'ref_id' => '43',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'numerovannyy-spisok',
    ],
    [
        'alias_id' => '43',
        'language_id' => null,
        'ref_id' => '44',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'spisok-opredeleniy',
    ],
    [
        'alias_id' => '44',
        'language_id' => null,
        'ref_id' => '45',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tablicy',
    ],
    [
        'alias_id' => '45',
        'language_id' => null,
        'ref_id' => '46',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'atributy-tega-table',
    ],
    [
        'alias_id' => '46',
        'language_id' => null,
        'ref_id' => '47',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'atributy-tega-td',
    ],
    [
        'alias_id' => '47',
        'language_id' => null,
        'ref_id' => '48',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'osobennosti-tablic',
    ],
    [
        'alias_id' => '48',
        'language_id' => null,
        'ref_id' => '49',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'vyravnivanie-tablic',
    ],
    [
        'alias_id' => '49',
        'language_id' => null,
        'ref_id' => '50',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'obedinenie-yacheek',
    ],
    [
        'alias_id' => '50',
        'language_id' => null,
        'ref_id' => '51',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'vlozhennye-tablicy',
    ],
    [
        'alias_id' => '51',
        'language_id' => null,
        'ref_id' => '52',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'zagolovok-tablicy',
    ],
    [
        'alias_id' => '52',
        'language_id' => null,
        'ref_id' => '53',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'freymy',
    ],
    [
        'alias_id' => '53',
        'language_id' => null,
        'ref_id' => '54',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'sozdanie-freymov',
    ],
    [
        'alias_id' => '54',
        'language_id' => null,
        'ref_id' => '55',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'ssylki-vo-freymah',
    ],
    [
        'alias_id' => '55',
        'language_id' => null,
        'ref_id' => '56',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'granicy-mezhdu-freymami',
    ],
    [
        'alias_id' => '56',
        'language_id' => null,
        'ref_id' => '57',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'izmenenie-razmerov-freymov',
    ],
    [
        'alias_id' => '57',
        'language_id' => null,
        'ref_id' => '58',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'polosy-prokrutki-freyma',
    ],
    [
        'alias_id' => '58',
        'language_id' => null,
        'ref_id' => '59',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'plavayushchie-freymy',
    ],
    [
        'alias_id' => '59',
        'language_id' => null,
        'ref_id' => '60',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'validaciya-dokumentov',
    ],
    [
        'alias_id' => '60',
        'language_id' => null,
        'ref_id' => '61',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'proverka-dannyh-na-validnost',
    ],
    [
        'alias_id' => '61',
        'language_id' => null,
        'ref_id' => '62',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'napisanie-korrektnogo-koda',
    ],
    [
        'alias_id' => '62',
        'language_id' => null,
        'ref_id' => '63',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'ispravlenie-oshibok',
    ],
    [
        'alias_id' => '63',
        'language_id' => null,
        'ref_id' => '3',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'osnovy-html',
    ],
    [
        'alias_id' => '65',
        'language_id' => null,
        'ref_id' => '4',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'instrumentariy',
    ],
    [
        'alias_id' => '66',
        'language_id' => null,
        'ref_id' => '5',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'tegi',
    ],
    [
        'alias_id' => '67',
        'language_id' => null,
        'ref_id' => '6',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'struktura-html-koda',
    ],
    [
        'alias_id' => '68',
        'language_id' => null,
        'ref_id' => '7',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'tipy-tegov',
    ],
    [
        'alias_id' => '69',
        'language_id' => null,
        'ref_id' => '8',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'znacheniya-atributov-tegov',
    ],
    [
        'alias_id' => '70',
        'language_id' => null,
        'ref_id' => '9',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'tekst',
    ],
    [
        'alias_id' => '71',
        'language_id' => null,
        'ref_id' => '10',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'ssylki',
    ],
    [
        'alias_id' => '72',
        'language_id' => null,
        'ref_id' => '11',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'yakorya',
    ],
    [
        'alias_id' => '73',
        'language_id' => null,
        'ref_id' => '12',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'izobrazheniya',
    ],
    [
        'alias_id' => '74',
        'language_id' => null,
        'ref_id' => '13',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'spiski',
    ],
    [
        'alias_id' => '75',
        'language_id' => null,
        'ref_id' => '14',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'tablicy',
    ],
    [
        'alias_id' => '76',
        'language_id' => null,
        'ref_id' => '15',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'freymy',
    ],
    [
        'alias_id' => '77',
        'language_id' => null,
        'ref_id' => '16',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleGroup',
        'code' => 'validaciya-dokumentov',
    ],
    [
        'alias_id' => '78',
        'language_id' => null,
        'ref_id' => '1',
        'ref_model' => 'crudschool\\modules\\articles\\models\\ArticleCategory',
        'code' => 'html',
    ],
    [
        'alias_id' => '110',
        'language_id' => null,
        'ref_id' => '68',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'bazovyy-sintaksis-css',
    ],
    [
        'alias_id' => '111',
        'language_id' => null,
        'ref_id' => '67',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'tipy-nositeley',
    ],
    [
        'alias_id' => '112',
        'language_id' => null,
        'ref_id' => '66',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'sposoby-dobavleniya-stiley-na-stranicu',
    ],
    [
        'alias_id' => '113',
        'language_id' => null,
        'ref_id' => '65',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'preimushchestva-stiley',
    ],
    [
        'alias_id' => '114',
        'language_id' => null,
        'ref_id' => '64',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'vvedenie-v-css',
    ],
    [
        'alias_id' => '115',
        'language_id' => null,
        'ref_id' => '69',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'znacheniya-stilevyh-svoystv',
    ],
    [
        'alias_id' => '116',
        'language_id' => null,
        'ref_id' => '70',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'selektory-tegov',
    ],
    [
        'alias_id' => '117',
        'language_id' => null,
        'ref_id' => '71',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'klassy',
    ],
    [
        'alias_id' => '118',
        'language_id' => null,
        'ref_id' => '72',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'identifikatory',
    ],
    [
        'alias_id' => '119',
        'language_id' => null,
        'ref_id' => '73',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'kontekstnye-selektory',
    ],
    [
        'alias_id' => '120',
        'language_id' => null,
        'ref_id' => '74',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'sosednie-selektory',
    ],
    [
        'alias_id' => '121',
        'language_id' => null,
        'ref_id' => '75',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'dochernie-selektory',
    ],
    [
        'alias_id' => '123',
        'language_id' => null,
        'ref_id' => '76',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'selektory-atributov',
    ],
    [
        'alias_id' => '124',
        'language_id' => null,
        'ref_id' => '77',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'universalnyy-selektor',
    ],
    [
        'alias_id' => '125',
        'language_id' => null,
        'ref_id' => '78',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'psevdoklassy',
    ],
    [
        'alias_id' => '126',
        'language_id' => null,
        'ref_id' => '79',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'psevdoelementy',
    ],
    [
        'alias_id' => '127',
        'language_id' => null,
        'ref_id' => '80',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'gruppirovanie',
    ],
    [
        'alias_id' => '128',
        'language_id' => null,
        'ref_id' => '81',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'nasledovanie',
    ],
    [
        'alias_id' => '129',
        'language_id' => null,
        'ref_id' => '82',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'kaskadirovanie',
    ],
    [
        'alias_id' => '130',
        'language_id' => null,
        'ref_id' => '83',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'validaciya-css',
    ],
    [
        'alias_id' => '131',
        'language_id' => null,
        'ref_id' => '84',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'identifikatory-i-klassy',
    ],
    [
        'alias_id' => '132',
        'language_id' => null,
        'ref_id' => '85',
        'ref_model' => 'crudschool\\modules\\articles\\models\\Article',
        'code' => 'napisanie-effektivnogo-koda',
    ],
]    
        );
    
    }

    public function safeDown()
    {
        $this->dropIndex('code', '{{%alias}}');
        $this->dropIndex('language_id', '{{%alias}}');
        $this->dropIndex('ref_id', '{{%alias}}');
        $this->dropTable('{{%alias}}');
    }
}

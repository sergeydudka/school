<?php

use yii\db\Schema;
use yii\db\Migration;

class m180826_095156_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_auth_assignment_item_name',
            '{{%auth_assignment}}','item_name',
            '{{%auth_item}}','name',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_auth_item_rule_name',
            '{{%auth_item}}','rule_name',
            '{{%auth_rule}}','name',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_auth_item_child_parent',
            '{{%auth_item_child}}','parent',
            '{{%auth_item}}','name',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_auth_item_child_child',
            '{{%auth_item_child}}','child',
            '{{%auth_item}}','name',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_assignment_item_name', '{{%auth_assignment}}');
        $this->dropForeignKey('fk_auth_item_rule_name', '{{%auth_item}}');
        $this->dropForeignKey('fk_auth_item_child_parent', '{{%auth_item_child}}');
        $this->dropForeignKey('fk_auth_item_child_child', '{{%auth_item_child}}');
    }
}

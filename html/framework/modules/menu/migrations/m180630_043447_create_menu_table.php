<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m180630_043447_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = ($this->db->getDriverName() === 'mysql') ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'parentId' => $this->integer()->null()->defaultValue(null),
            'alias' => $this->string(127)->notNull()->defaultValue(''),
            'section' => $this->string(127)->null()->defaultValue(null),
            'title' => $this->string(512)->notNull()->defaultValue(''),
            'type' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'route' => $this->string()->notNull()->defaultValue(''),
            'url' => $this->string()->notNull()->defaultValue(''),
            'extUrl' => $this->string()->notNull()->defaultValue(''),
            'queryParams' => $this->string(512)->notNull()->defaultValue(''),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
            'depth' => $this->smallInteger(3)->notNull()->defaultValue(0),
            'language' => $this->string(8)->notNull()->defaultValue(''),
            'hidden' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'createdAt' => $this->dateTime()->null()->defaultValue(null),
            'updatedAt' => $this->dateTime()->null()->defaultValue(null),
        ], $options);

        $this->createIndex('parentId', '{{%menu}}', ['parentId']);
        $this->createIndex('position', '{{%menu}}', ['position']);
        $this->createIndex('language', '{{%menu}}', ['language']);
        $this->createIndex('hidden', '{{%menu}}', ['hidden']);
        $this->createIndex('alias', '{{%menu}}', ['alias', 'parentId', 'language'], true);

        $this->addForeignKey(
            'fk-menu_parentId-menu',
            '{{%menu}}',
            'parentId',
            '{{%menu}}',
            'id',
            'SET NULL',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-menu_parentId-menu', '{{%menu}}');
        $this->dropIndex('alias', '{{%menu}}');
        $this->dropIndex('hidden', '{{%menu}}');
        $this->dropIndex('language', '{{%menu}}');
        $this->dropIndex('position', '{{%menu}}');
        $this->dropIndex('parentId', '{{%menu}}');
        $this->dropTable('{{%menu}}');
    }
}

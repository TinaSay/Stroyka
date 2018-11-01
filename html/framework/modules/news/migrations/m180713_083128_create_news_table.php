<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m180713_083128_create_news_table extends Migration
{
    public $table = '{{%news}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = ($this->db->getDriverName() === 'mysql') ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'group' => $this->Integer(11),
            'title' => $this->string(256)->notNull()->defaultValue(''),
            'text' => $this->text()->notNull(),
            'link' => $this->string(1000)->null()->defaultValue(null),
            'language' => $this->string(8)->notNull()->defaultValue('ru-RU'),
            'date' => $this->dateTime()->null()->defaultValue(null),
            'hidden' => $this->smallInteger(1)->notNull()->defaultValue('0'),
            'createdBy' => $this->integer(11),
            'createdAt' => $this->dateTime()->null()->defaultValue(null),
            'updatedAt' => $this->dateTime()->null()->defaultValue(null),
        ], $options);

        $this->createIndex('title', $this->table, ['title']);
        $this->createIndex('date', $this->table, ['date']);
        $this->createIndex('hidden', $this->table, ['hidden']);

        $this->addForeignKey(
            'fk-news-group',
            $this->table,
            'group',
            '{{%news_group}}',
            'id',
            'SET NULL',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk-news-auth',
            $this->table,
            'createdBy',
            '{{%auth}}',
            'id',
            'SET NULL',
            'RESTRICT'
        );

        for ($i = 1; $i < 12; $i++) {
            $str = 'Новости ' . $i;
            Yii::$app->db->createCommand()->insert($this->table, [
                'title' => $str,
                'text' => $str,
                'date' => new \yii\db\Expression('NOW()'),
                'createdAt' => new \yii\db\Expression('NOW()'),
                'updatedAt' => new \yii\db\Expression('NOW()'),
                'hidden' => 0,
                'group' => 1,
                'createdBy' => 1,
            ])->execute();
        }
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-news-auth', $this->table);
        $this->dropForeignKey('fk-news-group', $this->table);
        $this->dropTable($this->table);
    }
}

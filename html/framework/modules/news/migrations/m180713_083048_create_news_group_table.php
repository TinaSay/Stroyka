<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_group}}`.
 */
class m180713_083048_create_news_group_table extends Migration
{

    public $table = '{{%news_group}}';

    public function safeUp()
    {
        $options = ($this->db->getDriverName() === 'mysql') ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;

        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'title' => $this->string(256)->notNull()->defaultValue(''),
            'language' => $this->string(8)->notNull()->defaultValue('ru-RU'),
            'hidden' => $this->smallInteger(1)->notNull()->defaultValue('0'),
            'createdBy' => $this->integer(11),
            'createdAt' => $this->dateTime()->null()->defaultValue(null),
            'updatedAt' => $this->dateTime()->null()->defaultValue(null),
        ], $options);

        $this->createIndex('title', $this->table, ['title']);
        $this->createIndex('hidden', $this->table, ['hidden']);
        $this->addForeignKey(
            'news_group_createdBy_auth_id',
            $this->table,
            'createdBy',
            '{{%auth}}',
            'id',
            'SET NULL',
            'RESTRICT'
        );

        for ($i = 1; $i < 4; $i++) {
            $str = 'Группа новостей ' . $i;
            Yii::$app->db->createCommand()->insert($this->table, [
                'title' => $str,
                'createdAt' => new \yii\db\Expression('NOW()'),
                'updatedAt' => new \yii\db\Expression('NOW()'),
                'createdBy' => 1,
                'hidden' => 0,
            ])->execute();
        }
    }

    public function safeDown()
    {
        $this->dropForeignKey('news_group_createdBy_auth_id', $this->table);
        $this->dropTable($this->table);
    }
}

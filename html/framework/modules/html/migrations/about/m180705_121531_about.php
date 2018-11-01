<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m180705_121531_add_about
 */
class m180705_121531_about extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $text = file_get_contents(__DIR__ . '/data/about.html');

        $this->insert('{{%html}}', [
            'name' => 'about',
            'title' => '',
            'text' => $text,
            'template' => '@app/modules/html/widgets/views/default.php',
            'hidden' => 0,
            'language' => 'ru-RU',
            'createdAt' => new Expression('NOW()'),
            'updatedAt' => new Expression('NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%html}}', ['name' => 'about', 'language' => 'ru-RU']);
    }
}

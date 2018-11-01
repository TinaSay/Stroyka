<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m180706_051310_more
 */
class m180706_051310_more extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $text = file_get_contents(__DIR__ . '/data/more.html');

        $this->insert('{{%html}}', [
            'name' => 'more',
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
        $this->delete('{{%html}}', ['name' => 'more', 'language' => 'ru-RU']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180706_051310_more cannot be reverted.\n";

        return false;
    }
    */
}

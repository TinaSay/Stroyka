<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m180706_053236_credit
 */
class m180706_053236_credit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $text = file_get_contents(__DIR__ . '/data/card.html');

        $this->insert('{{%html}}', [
            'name' => 'credit',
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
        $this->delete('{{%html}}', ['name' => 'credit', 'language' => 'ru-RU']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180706_053236_credit cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m180709_085520_update_content
 */
class m180709_085520_update_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%content}}', 'frameLink', $this->text()->null()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%content}}', 'frameLink', $this->string(500)->null()->defaultValue(null));
    }


}

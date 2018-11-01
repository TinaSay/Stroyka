<?php

use yii\db\Migration;

/**
 * Class m180713_085520_add_column_content
 */
class m180713_085520_add_column_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%content}}', 'frameHeight', $this->string(500)->null()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%content}}', 'frameHeight');
    }


}

<?php

use yii\db\Migration;

/**
 * Class m180716_085520_add_column_content
 */
class m180716_085520_add_column_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%content}}', 'hideContent', $this->smallInteger()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%content}}', 'hideContent');
    }


}

<?php

use yii\db\Migration;

/**
 * Class m180704_061747_update_content
 */
class m180704_061747_update_content extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%content}}', 'hasFrame', $this->smallInteger(1)->null()->defaultValue(null));
        $this->addColumn('{{%content}}', 'frameLink', $this->string(500)->null()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%content}}', 'hasFrame');
        $this->dropColumn('{{%content}}', 'frameLink');
    }


}

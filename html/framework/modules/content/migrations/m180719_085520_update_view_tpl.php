<?php

use yii\db\Migration;

/**
 * Class m180719_085520_update_view_tpl
 */
class m180719_085520_update_view_tpl extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->db->createCommand("update {{%content}} set `view`='type' where `view`='about' ")->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }


}

<?php

use yii\db\Migration;

/**
 * Class m230401_181818_alter_tasks_table
 */
class m230401_181818_alter_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tasks}}', 'status', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%tasks}}', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_181818_alter_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `waiting`.
 */
class m161027_131514_create_waiting_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('waiting', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'link' => $this->string(255)->notNull(),
            'track_number' => $this->string(255)->notNull(),
            'price' => $this->float()->notNull(),
            'dt_add' => $this->integer(11),
            'dt_update' => $this->integer(11),
            'status' => $this->integer(11)->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('waiting');
    }
}
